<?php
/**
 * 云片API异常类
 * User: chocoboxxf
 * Date: 15/11/28
 * Time: 上午10:35
 */
namespace chocoboxxf\YunPian;

class YunPianException extends \Exception
{

    public $detail;


    public function __construct($message = "", $code = 0, $detail = "", \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->detail = $detail;
    }

    public function getDetail()
    {
        return $this->detail;
    }
}