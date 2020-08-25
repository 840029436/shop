<?php 
namespace app\demo\controller;

use app\BaseController;
use app\common\business\Demo;

class M extends BaseController
{
    public function index(){
        $user_id=$this->request->param('user_id',0,"intval");
        if(empty($user_id)){
            return show(config("status.error"),'参数错误');
        }
        $demo=new Demo();
        $result=$demo->getUserDataByUser_idCall($user_id);  
        return show(config("status.success"),'ok',$result);
    }
}
?>