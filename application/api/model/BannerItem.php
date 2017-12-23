<?php
namespace app\api\model;
use think\Model;
use think\Exception;
use think\Db;

class BannerItem extends BaseModel
{
	protected $hidden=['update_time','delete_time','id','img_id','banner_id'];
	public function img(){
		return $this->belongsTo('Image','img_id','id');
	}
}