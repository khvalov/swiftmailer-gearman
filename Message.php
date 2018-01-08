<?php
namespace khvalov\swiftmailer;

use Yii;
use yii\base\InvalidConfigException;
use yii\mswiftmailer;

class Message extends yii\swiftmailer\Message
{
 
    public function sendBackground($mailer = null){
       if ($mailer === null && $this->mailer === null) {
            $mailer = Yii::$app->getMailer();
        } elseif ($mailer === null) {
            $mailer = $this->mailer;
        }

        return $mailer->sendBackground($this);
    }

}
