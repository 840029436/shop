<?php 
namespace app\admin\controller;

class LoginOut extends AdminBase{

    public function index(){

        session(config("admin.session_admin"),null);

        return redirect(url('Login/login'));
    }
}
?>