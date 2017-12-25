<?php
namespace app\api\service;
/**
* 
*/

class Token{
	public static function generateToken(){
		//32字符组成一组随机字符串
		$randChars=getRandChars(32);
		$timestamp=$_SERVER['REQUEST_TIME_FLOAT'];
		//salt
		$salt=config('secure.token_salt');
		return md5($randChars.$timestamp.$salt);
	}


}