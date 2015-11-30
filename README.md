# yii2-yunpian-sdk
基于Yii2实现的云片(YunPian)短信API SDK（目前开发中）

环境条件
--------
- >= PHP 5.4
- >= Yii 2.0

安装
----

添加下列代码在``composer.json``文件中并执行``composer update --no-dev``操作

```json
{
    "require": {
       "chocoboxxf/yii2-yunpian-sdk": "dev-master"
    }
}
```

使用示例
--------

短信 API
```php
// 全局使用
// 在config/main.php配置文件中定义component配置信息
'components' => [
  .....
  'Sms' => [ // 
    'class' => 'chocoboxxf/YunPian/YunPianSms',
    'appKey' => '云片网络的APIKEY',
  ]
  ....
]
// 代码中调用
try {
    $result = Yii::$app->Sms->send('手机号', '短信内容');
} catch (\chocoboxxf\YunPian\YunPianException $ex) {
    $code  = $ex->getCode(); // 错误码
    $message = $ex->getMessage(); // 错误信息
    $detail = $ex->getDetail(); // 错误详细信息
}
....

// 局部调用
$sms = Yii::createObject([
    'class' => 'chocoboxxf/YunPian/YunPianSms',
    'appKey' => '云片网络的APIKEY',
]);
try {
    $result = $sms->send('手机号', '短信内容');
} catch (\chocoboxxf\YunPian\YunPianException $ex) {
    $code  = $ex->getCode(); // 错误码
    $message = $ex->getMessage(); // 错误信息
    $detail = $ex->getDetail(); // 错误详细信息
}
....

```