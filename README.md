# swiftmailer-gearman
Yii2-Swiftmailer extension to  providing sending mail functionality via Gearman 

Install: 

```
"khvalov/swiftmailer-gearman": "*" 
```
to your composer.json

Config: 
```
'components'=>[
...
        'gearman' => [
          'class' => 'shakura\yii2\gearman\GearmanComponent',
          'servers' => [
              ['host' => '127.0.0.1', 'port' => 4730],
          ],
          'jobs' => [
              'mailer' => [
                  'class' => 'khvalov\swiftmailer\MailerJob'
              ],
          ]
        ],
...
]
```
[Deatils on Gearman extension for Yii2 ](https://github.com/shakura/yii2-gearman)

Sending mail from your application: 
```
\Yii::$app->mailer->compose('template', [
                      'model'=>$model,
                    ])->setTo('nobody@email.com')
                    ->setSubject('Your subject goes here!')
                    ->sendBackground();
```
[Deatils on Swiftmailer extension for Yii2 ](https://github.com/yiisoft/yii2-swiftmailer)
