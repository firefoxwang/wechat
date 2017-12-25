<?php
namespace app\api\validate;
class Address extends BaseValidate{
	protected $rule=[
		['name','require|isNotEmpty','缺少姓名|不能为空'],
		['mobile','require|isMobile','缺少手机号|不是一个正确的手机号'],
		['province','require|isNotEmpty'],
		['city','require|isNotEmpty'],
		['country','require|isNotEmpty'],
		['detail','require|isNootEmpty' ],
	];

}