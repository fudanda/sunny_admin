<?php
// +----------------------------------------------------------------------
// | Sunny [ A development of scaffolding base thinkphp5.1 layui2.* ]
// +----------------------------------------------------------------------
// | Copyleft
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: blues ,<mymyjd@163.com>
// +----------------------------------------------------------------------
//网站前端配置  邮箱配置
namespace app\admin\controller;
use app\admin\validate\Web as VWeb;
use app\admin\model\Web as MWeb;
use app\admin\model\Email as MEmail;
use app\admin\validate\Email as VEmail;
class Web extends Admin{
	public function web(){
		if($this->request->isPut()){
			$put=$this->request->put();
			$validate=new VWeb;
			$result=$validate->check($put);
			if(!$result){
				return json(array('code'=>400,'error'=>$result));
			}
			MWeb::where('id',1)->update($put);
			return json(array('code'=>200,'msg'=>'更新成功'));
		}
			return ['code'=>200,'msg'=>'获取成功','data'=>MWeb::where('id',1)->find()];
		
	}
	public function email(){
		if($this->request->isPut()){
			$put=$this->request->put();
			$validate=new VEmail;
			$result=$validate->check($put);
			if(!$result){
				return json(array('code'=>400,'error'=>$validate->getError()));
			}
			MEmail::where('id',1)->update($put);
			return json(array('code'=>200,'msg'=>'更新成功'));
		}
		return ['code'=>200,'msg'=>'获取成功','data'=>MEmail::where('id',1)->find()];
	}	
}