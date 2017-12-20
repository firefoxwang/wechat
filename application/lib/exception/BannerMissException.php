<?php
namespace app\lib\exception;
/**
 * banner error class
 */
class BannerMissException extends BaseException{
	public $code=404;
	public $msg='request banner not found';
	public $errorCode=40000;

	
}