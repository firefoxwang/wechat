<?php
namespace app\api\validate;
/**
* 
*/
class TokenGet extends BaseValidate
{
	protected $rule=[
		['code','require|isNotEmpty','参数必须传|参数不能为空'],
	];
	
}