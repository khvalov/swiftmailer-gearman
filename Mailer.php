<?php

namespace khvalov\swiftmailer;

use Yii;
use yii\base\InvalidConfigException;
use yii\swiftmailer;

class Mailer extends yii\swiftmailer\Mailer
{

    public function sendBackground($message){

        $swiftmailer=$this->getSwiftMailer();

        \Yii::$app->gearman->getDispatcher()->background('mailer', new \shakura\yii2\gearman\JobWorkload([
            'params' => [
                'mailer'  => $swiftmailer,
                'message' =>$message
            ]
        ]));


        return true;
    
    }
}
