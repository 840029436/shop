<?php 
namespace app\admin\controller;
use  app\common\lib\Arr;

use app\BaseController;

class Specs extends BaseController{

    public function dialog(){

        return View("",['specs' =>  json_encode(config("Specs"))]);
    }

}
