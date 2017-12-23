<?php
namespace app\api\model;
use think\Model;
/**
* 
*/
class Image extends Model
{
	protected $hidden=['from','delete_time','update_time','id'];
	
	public function getUrlAttr($value){

		return config('setting.img_prefix').$value;
	}
}
