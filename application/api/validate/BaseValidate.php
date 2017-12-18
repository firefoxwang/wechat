<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use think\Exception;
/**
* 基类
*/
class BaseValidate extends Validate
{
	/**
	 * [doCheck 用于接受参数进行validaet校验]
	 * @return [type] [boolean]
	 * @author xiaodo 2017-12-17
	 */
	public function doCheck(){
		$request=Request::instance();
		$params=$request->param();

		$result=$this->check($params);
		if(!$result){
			$error=$this->error;
			throw new Exception($error);
		}else{
			return true;
		}


	}	
}