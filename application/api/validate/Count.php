<?php
namespace app\api\validate;
/**
* 
*/

class Count extends BaseValidate
{
	protected $rule=[
		['count','isPositiveInteger|between:1,15','传入必须为正整数|传入范围不能大于15']
	];
	
}