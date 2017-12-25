<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use think\Exception;
use app\lib\exception\ParameterException;
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

		$result=$this->batch()->check($params);
		if(!$result){
			$data=array('msg'=>$this->error);
			// print_r($data);exit;
			$e=new ParameterException($data);
			// $e->msg=$this->error;
			// $e->errorCode=10002;
			throw $e;
			// $error=$this->error;
			// throw new Exception($error);
		}else{
			return true;
		}


	}	
	protected function isPositiveInteger($value,$rule='',$data='',$field=''){

		if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
			return true;
		}else{
			return false;
		}
	}
	protected function isNotEmpty($value,$rule='',$data='',$field=''){
		if(empty($value)){
			return false;
		}
		else{
			return true;
		}

	}
}