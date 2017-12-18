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
		['id','require|isPositiveInteger']



	];

	/**
	 * [isPositiveInteger description]
	 * @type 自定义验证规则
	 * @param  [type]  $value [description]
	 * @param  string  $rule  [description]
	 * @param  string  $data  [description]
	 * @param  string  $field [description]
	 * @return boolean        [description]
	 * @author liangguangchuan 2017-12-17
	 */
	protected function isPositiveInteger($value,$rule='',$data='',$field=''){

		if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
			return true;
		}else{
			return $field.'必须是正整数';
		}
	}
	
}