<?php
namespace app\api\service;
/**
* 
*/
use think\Request;
use think\Cache;
use app\lib\exception\TokenException;

class Token{
	public static function generateToken(){
		//32字符组成一组随机字符串
		$randChars=getRandChars(32);
		$timestamp=$_SERVER['REQUEST_TIME_FLOAT'];
		//salt
		$salt=config('secure.token_salt');
		return md5($randChars.$timestamp.$salt);
	}

	public static function getCurrentTokenVar($key){
		$token = Request::instance()
					->header('token');
		$vars=Cache::get($token);
		if(!$vars){
			throw new TokenException();
		}else{
			//文件缓存器
			if(!is_array($vars)){
			$vars=json_decode($vars,true);
			}
			if(array_key_exists($key,$vars)){
				return $vars[$key];
			}else{
				throw new Exception('token不存在');
			}


		}
	}

	public static function getCurrentUid(){
		$uid=self::getCurrentTokenVar('uid');
		return $uid;
	}


}
