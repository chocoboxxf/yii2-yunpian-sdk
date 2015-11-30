<?php
/**
 * 云片API基类
 * User: chocobo
 * Date: 15/11/27
 * Time: 下午11:32
 */

namespace chocoboxxf\YunPian;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use GuzzleHttp\Client;

class YunPian extends Component
{
    const DEFAULT_API_URL = 'http://yunpian.com/{version}/';

    const DEFAULT_API_VERSION = 'v1';

    public $defaultErrorMessage = '未知异常';

    public $errorMessages = [
        '1'   => '请求参数缺失',
        '2'   => '请求参数格式错误',
        '3'   => '账户余额不足',
        '4'   => '关键词屏蔽',
        '5'   => '未找到对应id的模板',
        '6'   => '添加模板失败',
        '7'   => '模板不可用',
        '8'   => '同一手机号30秒内重复提交相同的内容',
        '9'   => '同一手机号5分钟内重复提交相同的内容超过3次',
        '10'  => '手机号黑名单过滤',
        '11'  => '接口不支持GET方式调用',
        '12'  => '接口不支持POST方式调用',
        '13'  => '营销短信暂停发送',
        '14'  => '解码失败',
        '15'  => '签名不匹配',
        '16'  => '签名格式不正确',
        '17'  => '24小时内同一手机号发送次数超过限制',
        '18'  => '签名校验失败',
        '19'  => '请求已失效',
        '20'  => '不支持的国家地区',
        '21'  => '解密失败',
        '22'  => '1小时内同一手机号发送次数超过限制',
        '23'  => '发往模板支持的国家列表之外的地区',
        '24'  => '添加告警设置失败',
        '25'  => '手机号和内容个数不匹配',
        '26'  => '流量包错误',
        '27'  => '未开通金额计费',
        '28'  => '运营商错误',
        '-1'  => '非法的apikey',
        '-2'  => 'API没有权限',
        '-3'  => 'IP没有权限',
        '-4'  => '访问次数超限',
        '-5'  => '访问频率超限',
        '-50' => '未知异常',
        '-51' => '系统繁忙',
        '-52' => '充值失败',
        '-53' => '提交短信失败',
        '-54' => '记录已存在',
        '-55' => '记录不存在',
        '-57' => '用户开通过固定签名功能，但签名未设置',
    ];

    public $apiUrl = YunPian::DEFAULT_API_URL;

    public $apiVersion = YunPian::DEFAULT_API_VERSION;

    public $apiKey;

    public $apiClient;

    public function init()
    {
        if ($this->apiKey === null) {
            throw new InvalidConfigException('The "apiKey" property must be set.');
        }

        $this->apiClient = new Client([
            'base_url' => [
                $this->apiUrl,
                [
                    'version' => $this->apiVersion,
                ]
            ],
            'defaults' => [
                'body' => [
                    'apikey' => $this->apiKey,
                ]
            ]
        ]);
    }

    public function getError($code)
    {
        return isset($this->errorMessages[strval($code)]) ?
            $this->errorMessages[strval($code)] :
            $this->defaultErrorMessage;
    }

}