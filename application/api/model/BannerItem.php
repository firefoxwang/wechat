<?php
namespace app\api\model;
use think\Model;
use think\Exception;
use think\Db;

class BannerItem extends Model
{
	public function img(){
		return $this->belongsTo('Image','img_id','id');
	}
}