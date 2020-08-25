<?php 
namespace app\admin\controller;

use app\BaseController;
use app\common\business\SpecsValueBus;
use app\admin\validata\SpecsValue as valiSpecs;

class SpecsValue extends BaseController{

    public function getBySpecsId()
    {
        $specs_id=$this->request->param('specs_id','0','intval');
        if(!$specs_id){
            return show(config("status.success"),'没有数据');
        }
        $result=(new SpecsValueBus)->getBySpecsId($specs_id);
        return show(config('status.success'),'ok',$result);
        // dump($result);
    }

    public function save()
    {
        $specsId = input("param.specs_id", 0, "intval");
        $name = input("param.name", "", "trim");
        $data = [
            "specs_id" => $specsId,
            "name" => $name,
        ];
        $validata=(new valiSpecs())->scene('specsValueIdName');
        if(!$validata->check($data)){
            return show(config("status.error"),$validata->getError());
        }
        $id = (new SpecsValueBus())->add($data);
        if(!$id) {
            return show(config('status.error'), "新增失败");
        }

        return show(config("status.success"), "OK", ["id" => $id]);
    }
}
?>