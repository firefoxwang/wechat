<?php
namespace app\lib\exception;
/**
* 
*/
class CategoryException extends BaseException
{
	public $code=404;
	public $msg='指定的类目不存在，请检查id');
	public $errorCode=50000;
	
}