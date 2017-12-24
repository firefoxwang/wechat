<?php
namespace app\api\model;
/**
* 
*/

class Product extends BaseModel
{
	protected $hidden=[
		'delete_time','main_img_id','pivot','from','creat_time','update_time',
	];
	
	public function getMainImgUrlAttr($value,$data){
		return $this->prefixImGUrl($value,$data);
	}
	public static function getMostRecent($count){
		return self::limit($count)
					->order('create_time desc')
					->select();
	}
}