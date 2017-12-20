<?php
namespace app\lib\exception;

/**
* 
*/
class ParameterException extends BaseException
{
	public $code=400;
	public $msg='param error';	
	public $errorCode=10006;


	
}