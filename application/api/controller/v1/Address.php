<?php
namespace app\api\controller\v1;

use app\api\service\Token;
use app\lib\exception\UserException;
use app\lib\exception\SuccessMessage;
class Address{
	public function createOrUpdateAddress(){
		$validate=validate('AddressNew');
		$validate->doCheck();
		$uid=Token::getCurrentUid();
		$user=model('User')::get($uid);
		if(!$user){
			throw new UserException();
		}

		$dataArr=$validate->getDataByRule(input('post.'));

		$userAddress=$user->address;

		if(!$userAddress){
			$user->address()->save($dataArr);
		}else{
			$user->address->savej($dataArr);

		}
		return new SuccessMessage();
	}
	

}
