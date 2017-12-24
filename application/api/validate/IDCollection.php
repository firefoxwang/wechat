<?php
namespace app\api\validate;

use think\Validate;

/**
* 
*/
class IDCollection extends BaseValidate
{
	protected $rule=[
		['ids','require|checkIDs','参数缺少|id参数错误'],

	];
	
	/**
	 * [checkIDs id1,id2,id3.....]
	 * @param  [type] $valude [description]
	 * @return [type]         [false,true]
	 * @author liangguangchuan 2017-12-23
	 */
	protected function checkIDs($value){
		$values=explode(',',$value);
		// print_r($values);exit;
		if(empty($values)){
			return false;
		}
		foreach($values as $id){
			if(!$this->isPositiveInteger($id)){
				return false;
			}
		}
		return true;
	}
	
}