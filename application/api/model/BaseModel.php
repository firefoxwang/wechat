<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //
    protected function prefixImgUrl($value,$data){
    	// print($data['from'])
		if($data['from']==1){
		return config('setting.img_prefix').$value;
		}
	}

	
}
