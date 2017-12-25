<?php
namespace app\api\service;
/**
* 
*/
use app\lib\exception\WeChatException;
use think\Exception;
class UserToken
{
	protected $code;
	protected $wxAppID;
	protected $wxAppSecret;
	protected $wxLoginUrl;

	/**
	 * [__construct 构造函数，初始化变量]
	 * @param  [type] $code [description]
	 * @author liangguangchuan 2017-12-24
	 */
	function __construct($code){
		$this->code=$code;
		$this->wxAppID=config('wx.app_id');
		$this->wxAppSecret=config('wx.app_secret');
		$this->wxLoginUrl=sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);

	}
	public function get(){
		// print($this->wxLoginUrl);exit;
		$result=curl_get($this->wxLoginUrl);
		// print_r($result);exit;
		$wxResult=json_decode($result,true);
		if(empty($wxResult)){
			throw new Exception('获取微信id异常，内部错误');
		}else{
			$loginFail=array_key_exists('errcode',$wxResult);
			if($loginFail){
				$this->processLoginError($wxResult);

			}else{
				$this->grantToken($wxResult);

			}
		}

	}

	private function grantToken($wxResult){
		//拿到oppenid
		$openid=$wxResult['openid'];
	}


	private function processLoginError($wxResult){
		throw new WeChatException([
			'msg'=>$wxResult['errmsg'],
			'errorCode'=>$wxResult['errcode']
	]);

	}
	
}