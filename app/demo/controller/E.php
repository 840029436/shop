<?php 
namespace app\demo\controller;

use app\BaseController;

class E extends BaseController{

    public function index(){
        echo 2222;
        //throw new \think\exception\HttpException('404','找不到数据');
    }
    public function abc(){
        
        var_dump(request());
    }
}
?> 