<?php
namespace app\api\controller\v1;
/**
* 
*/
use app\api\service\UserToken;
class Token
{
	public function getToken($code=''){
		validate('TokenGet')->docheck();
		$tk=new UserToken($code);
		$token=$tk->get();
		return ['token'=>$token];

	}
	
}