<?php
namespace app\api\controller\v1;

use app\api\service\Token;
class Address{
	public function createOrUpdateAddress(){
		validate('AddressNew')->doCheck();
		$uid=Token::getCurrentUid();


	}
}