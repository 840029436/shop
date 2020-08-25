<?php 
namespace app\admin\controller;

use think\facade\View;
use app\admin\validata\AdminUser as vali;
use app\admin\business\AdminLogin;
use think\Exception;

class Login extends AdminBase{

    public function initialize()
    {
        if($this->isLogin()){
            return $this->redirect(url('Index/index'),302);
        }
    }

    public function login(){
        
         return View::fetch();
    }
    public  function check(){

        if(!$this->request->isPost()){
            return show(config("status.error"),'请求方式错误');
        }
        $username=$this->request->param('username',"","trim");
        $password=$this->request->param('password',"","trim"); 
        $captcha=$this->request->param('captcha',"","trim"); 
/**   ***************************** 使用验证规则（validate）验证用户名 密码 是否输入 ，验证码 输入是否正确与空  （后台验证，前台无须显示）****** ****** */     
        $data=[
            'username'      =>      $username,
            'password'      =>      $password,
            'captcha'       =>      $captcha
        ];
        $valiData = new vali();
        if(!$valiData->check($data)){
            return show(config("status.null_error"),$valiData->getError());
        }
/**   ***************************** 普通验证用户名 密码  验证码的方式 **************************************************************************** */
        // if(empty($username) || empty($password) || empty($captcha)){ 

        //     return show(config("status.error",'参数不能为空'));
        // }
        
        // if(!captcha_check($captcha)){
        //     //验证码校验失败
        //     return show(config("status.error",'验证码不正确'));
        // }
/**   ********************************************************************************************************************************************* */     

        $admin = new AdminLogin();
        $result=$admin::login($data);
        if($result){
            return $result;
        }else{

            throw new Exception("登录失败");
        }
         
        
    }
}
?>