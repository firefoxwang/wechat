<?php
namespace app\api\service;
/**
* 
*/
use app\lib\exception\WeChatException;
use app\lib\exception\TokenException;
use think\Exception;
class UserToken extends Token
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
				return $this->grantToken($wxResult);

			}
		}

	}

	private function grantToken($wxResult){
		//拿到oppenid
		$openid=$wxResult['openid' ];
		//数据库里对比一下是否存在openid
		$user=model('User')->getByOpenID($openid);
		if($user){
			$uid=$user->id;
		}else{
			$uid=$this->newUser($openid);

		}
		//如果存在，不处理，不存在，就插入记录
		//生成令牌，存入缓存数据，吸入缓存
		$cachedValue=$this->prepareCachedValue($wxResult,$uid);
		$token=$this->saveToCache($cachedValue);
		return $token;

		//吧令牌返回客户端
	}
	private function saveToCache($cachedValue){
		$key=self::generateToken();
		$value=json_encode($cachedValue);
		$expire_in=config('setting.token_expire_in');
		$request = cache($key,$value,$expire_in);
		if(!$request){
			throw new TokenException([
				'msg'=>'服务器缓存错误',
				'errorCode'=>10005
			]);
		}
		return $key;
	}
	private function prepareCachedValue($wxResult,$uid){
		$cachedValue=$wxResult;
		$cachedValue['uid']=$uid;
		$cachedValue['scope']=16;
		return $cachedValue;
	}

	private function newUser($openid){
		$user=model('User')->create(
			['openid'=>$openid]
		);
		return $user->id;
	}
	private function processLoginError($wxResult){
		throw new WeChatException([
			'msg'=>$wxResult['errmsg'],
			'errorCode'=>$wxResult['errcode']
	]);

	}
	
}