<?php
/**
 * 云片短信API测试
 * User: chocobo
 * Date: 15/11/28
 * Time: 上午12:10
 */

namespace chocoboxxf\YunPian\Tests;

use Yii;

class YunPianSmsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \chocoboxxf\YunPian\YunPianException
     */
    public function testSend()
    {
        $mobile = '12345678901';
        $message = '短信模板内容';

        $yunPianSms = Yii::createObject([
            'class' => 'chocoboxxf\YunPian\YunPianSms',
            'apiKey' => '请输入apikey',
        ]);
        $yunPianSms->send($mobile, $message);
    }
}
