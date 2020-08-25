<?php
namespace app\admin\controller;

use think\facade\View;

class Index extends AdminBase{

    public function index(){

        return view::fetch();   
    }
    public function welcome()
    {
        return view::fetch();   
    }
}
?>