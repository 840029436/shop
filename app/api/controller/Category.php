<?php

namespace app\api\controller;

use app\common\business\AdminCategory;
use app\common\lib\Arr;
use Exception;
use think\facade\Log;
use app\common\lib\sms\Show;

class Category extends ApiBase
{

    //获取分类的所有内容
    public function index()
    {
        try {
            $categoryBusObj = (new AdminCategory())->getNormalCategoryAs();
            $getTree = (new Arr())->getTree($categoryBusObj);
        } catch (Exception $e) {
            Log::write('无限分类&&限制分类' . $e->getMessage());
            return show(config("status.success"), '内部异常');

        }
        if (!$getTree) {
            return show(config("status.success"), '数据为空');
        }
        $sliceTree = Arr::sliceTreeArr($getTree);
        // dump($sliceTree);die();
        return show(config("status.success"), 'OK', $sliceTree);
    }
    //按商品分类搜索  功能  未完成功能   这是 静态的
    public function search()
    {
//        halt(input());
        $id=$this->request->param('cid',13,"intval");
        if($id==0){
            return show(config("status.error"),'页面跳转错误');
        }
        $searchResult=(new AdminCategory())->getCategorySearch($id);
        return Show::success($searchResult);
    }

}