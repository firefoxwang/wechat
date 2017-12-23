<?php
namespace app\api\controller\v2;
use think\Validate;
use think\Exception;
use app\lib\exception\BannerMissException;
use app\api\model\Banner as BannerModel;
// use app\api\validate\TestValidate;
class Banner{
	/**
	 * [getBanner description]
	 * @param  [type] $id [banner的id号]
	 * @return [type]     [description]
	 * @url /banner/:id
	 * @author xiaodo 2017-12-17
	 */
	
	public function getBanner($id){
		return 'this is v2 version';
	}

}