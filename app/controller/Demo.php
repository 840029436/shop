<?php 
namespace app\controller;

use app\BaseController;

    class Demo extends BaseController
    {
        function index(){
            dump($this->request->param());
        }
        function demo(){
            dump($this->request->param());
        }
        function show(){
            $result=[
                'status'=>1,
                'message'=>'ok',
                'result'=>[
                    'id'=>1
                ],
            ];
            $header=[
                'Token'=>'e23sadas'
            ];
            return json($result,201,$header);

        }
    }
?>