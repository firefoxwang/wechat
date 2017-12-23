<?php
namespace app\api\model;
use think\Model;
/**
* 
*/
class Image extends BaseModel
{
	protected $hidden=['from','delete_time','update_time','id'];
	/**
	 * [getUrlAttr url字段的读取器，进行过滤]
	 * @param  [type] $value [description]
	 * @param  [type] $data  [description]
	 * @return [type]        [description]
	 * @author liangguangchuan 2017-12-23
	 */
	public function getUrlAttr($value,$data){
		return $this->prefixImgUrl($value,$data);
	}
	
}
