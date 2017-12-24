<?php
namespace app\api\validate;

/**
* @return validate 验证
* @author  by xiaodo
*  
* 
*/
use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
	protected $rule=[
		['id','require|isPositiveInteger','参数必须传递|参数必须是正整数'],
		



	];


	
}