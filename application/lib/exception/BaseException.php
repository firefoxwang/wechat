<?php
namespace app\lib\exception;
use think\Exception;
class BaseException extends Exception{
	/**
	 * [$code 状态码 400,200]
	 * @var [type]
	 */
	public $code=400;
	public $msg='args error';
	public $errorCode=10000;

}