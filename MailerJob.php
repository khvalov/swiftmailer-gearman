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
        
        \Yii::info('Sending email "' . $message->getSubject() . '" to "' . $address . '"', __METHOD__);


        $mailer->send($message->getSwiftMessage());

        $mailer->getTransport()->stop();
       
    }
}
