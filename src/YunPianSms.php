<?php
/**
 * 云片短信API
 * User: chocobo
 * Date: 15/11/27
 * Time: 下午10:54
 */
namespace chocoboxxf\YunPian;

use Yii;

class YunPianSms extends YunPian
{
    const PATH_SEND_SMS = 'sms/send.json';

    public function init()
    {
        parent::init();
    }

    public function send($mobile, $text)
    {
        $response = $this->apiClient->post(
            YunPianSms::PATH_SEND_SMS,
            [
                'body' => [
                    'mobile' => $mobile,
                    'text' => $text,
                ]
            ]
        );
        $result = $response->json();
        // 正常情况
        if ((int)$result['code'] === 0) {
            return $result['result'];
        }
        // 错误情况
        $message = $this->getError($result['code']);
        Yii::error($message);
        throw new YunPianException(
            $message,
            $result['code'],
            isset($result['detail']) ? $result['detail'] : ''
        );

    }
}