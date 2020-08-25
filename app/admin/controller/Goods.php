<?php
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use app\common\business\GoodsBus;
use Exception;
use app\admin\validata\Goods as GoodsVali;

class Goods extends BaseController{

    public function add(){

        return View::fetch();
    }
    public function index(){

        $data=[];
        $title=$this->request->param('title','','trim');
        $time=$this->request->param('time','','trim');
        
        if(!empty($title)){
            $data['title']=$data;
        }
        if(!empty($time)){
            $data['create_time']=explode("-",$time);
            //dump($data['create_time']);exit;
        }
        $goods = (new GoodsBus())->getLists($data,5);
        // dump($goods);exit;
        view::assign(['goods'=>$goods]);
        return View::fetch();
    }
    public function save() {
        // 判断是否为post请求，
        if(!$this->request->isPost()) {
            return show(config('status.error'), "参数不合法");
        }
//        halt($this->request->isPost());
        //验证机制
        $data = input("param.");
        //检查token
        $check = $this->request->checkToken('__token__');
        if(!$check) {
            return show(config('status.error'), "非法请求");
        }
        //  halt($data);
        // 数据处理 = > 基于 我们得验证成功之后
        $data['category_path_id'] = $data['category_id'];
        $result = explode(",", $data['category_path_id']);
        $data['category_id'] = end($result);
        try{
            $res = (new GoodsBus())->insertData($data);
        }catch(Exception $e){
            return show(config('status.error'),$e->getMessage());
        }
        
        if(!$res) {
            return show(config('status.error'), "商品新增失败");
        }

        return show(config('status.success'), "商品新增成功");
    }
    //推荐
    public  function  recommend()
    {
        $recommendId=$this->request->param('id',0,"intval");
        $is_index_recommend=$this->request->param('is_index_recommend','0',"intval");
        $data=[
            'id'                 =>      $recommendId,
            'is_index_recommend' =>      $is_index_recommend
        ];
        $goodsVali = (new GoodsVali())->scene('idVali');
        if(!$goodsVali->check($data)){
            return show(config("status.error"),$goodsVali->getError());
        }
        $GoodsBus = (new GoodsBus())->changeRecommend($recommendId,$is_index_recommend);
        if(!$GoodsBus){
            return show(config("status.error"),'更改失败');
        }

        return show(config("status.success"),'更改成功');
    }

}
