<?php
namespace app\lib\exception;
/**
* 
*/
class ProductException extends BaseException
{
	public $code=404;
	public $msg='指定的商品不存在');
	public $errorCode=200000;
	
}