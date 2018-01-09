<?php
namespace khvalov\swiftmailer;

use shakura\yii2\gearman\JobBase;

class MailerJob extends JobBase
{
    public function execute(\GearmanJob $job = null)
    {
        $params = $this->getWorkload($job)->getParams();

        $mailer  = $params['mailer'];
        $message = $params['message'];

        $address = $message->getTo();
        if (is_array($address)) {
            $address = implode(', ', array_keys($address));
        }
        
        echo ('Sending email "' . $message->getSubject() . '" to "' . $address . '"');
        echo PHP_EOL;


        $mailer->send($message->getSwiftMessage());

        $mailer->getTransport()->stop();
       
    }
}
