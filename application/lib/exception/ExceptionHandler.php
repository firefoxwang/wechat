<?php
namespace app\lib\exception;
use think\Execption;
use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle{
	private $code;
	private $msg;
	private $errorCode;
	//返回客户端当前请求的url路径
	private $url;

	public function render(\Exception $e){
		if($e instanceof BaseException){
			$this->code=$e->code;
			$this->msg=$e->msg;
			$this->errorCode=$e->errorCode;
		}else{
			$this->code=500;
			$this->msg='server is wrong,not your bussiness';
			$this->errorCode=999;
		}
		$request=Request::instance();
		$result=[
			'msg'=>$this->msg,
			'errorCode'=>$this->errorCode,
			'request_url'=>$request->url()
		];
		return json($result,$this->code);
	}
}