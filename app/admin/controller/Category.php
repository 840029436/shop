<?php

namespace app\admin\controller;

use think\facade\View;
use app\admin\validata\Category as valiCategory;
use app\common\business\AdminCategory;
use Exception;
use app\common\lib\Arr;

class Category extends AdminBase
{
    //通过获取pid 获取子栏目   
    public function index()
    {
        $pid = request()->param('pid', 0, 'intval');
        //  dump($pid);
        
        $data = [
            'pid'       =>      $pid
        ];
        // $getCategoryList = (new AdminCategory())->getNormalCategoryList($data, 5);
        // dump($getCategoryList);exit;
        try {
            $getCategoryList = (new AdminCategory())->getNormalCategoryList($data, 5);

        } catch (Exception $e) {
            $getCategoryList = Arr::defaultPage(5);
        }
        // halt($getCategoryList);
        View::assign([
            'getCategoryList'       =>          $getCategoryList,
            'pid'                   =>          $pid
        ]);
        return view::fetch();
    }
    public function add()
    {
        try {
            $category = (new AdminCategory())->getNormalCategory();
        } catch (Exception $e) {
            $category = [];
        }
        View::assign([
            'category'  => json_encode($category),
        ]);
        return view::fetch();
    }
    //更新分类
    public function save()
    {
        $pid = request()->param('pid', '', "intval");
        $name = request()->param('name', '');

        $categoryData = [
            'pid'           =>      $pid,
            'name'          =>      $name
        ];
        $validata = (new valiCategory())->scene('categorysave');
        if (!$validata->check($categoryData)) {
            return show(config("status.error"), $validata->getError());
        }
        try {
            $AdminCategory =(new  AdminCategory())->add($categoryData, $name);
   
        } catch (Exception $e) {
            return show(config("status.error"), $e->getMessage());
        }
        if($AdminCategory){
            return show(config("status.success"), '新增分类成功');
        }
        return show(config("status.error"), '新增分类失败');
    }
    //修改排序
    public function listOrder(){

        $id=request()->param('id',0,"intval");
        $listorder=request()->param('listorder',0,'intval');
        $data=[
            'id'        =>      $id,
            'listorder' =>      $listorder
        ];
        $validata = (new valiCategory())->scene('categoryListOrder');
        if(!$validata->check($data)){
            return show(config("status.error"), $validata->getError());
        }
        if(!$id){
            return show(config("status.error"),'参数错误');
        }
        $data=[
            'listorder'     =>      $listorder,
            'update_time'   =>      time()
        ];
        try{
            $result=(new  AdminCategory())->alterCategoryList($id,$data);
        }catch(Exception $e){

            return show(config("status.error"),$e->getMessage());
        }
        if($result){

            return show(config("status.success"),'排序修改成功');
        }
 
        return show(config("status.error"),'排序修改失败');
    }
    // 修改category分类的状态码
    public function changeStatus()
    {
        $id=request()->param('id',0,"intval");
        $status=request()->param('status',0,'intval');
        $data=[
            'id'            =>          $id,
            'status'        =>          $status
        ];
       
        $validata = (new valiCategory())->scene('categoryStatus');
        if(!$validata->check($data)){
            return show(config("status.error"),$validata->getError());
        }
        $data=[
            'status'        =>          $status,
            'update_time'   =>          time()
        ];
        try{
            $result=(new AdminCategory())->alterCategoryList($id,$data);
            
        }catch(Exception $e){
            return show(config("status.error"),$e->getMessage());
        }
        if($result){
            if($status ==0){
                return show(config("status.success"),'修改为待审核状态');
            }
            return show(config("status.success"),'审核已通过');
        }
        return show(config("status.error"),'状态码修改失败');

    }

    // 在分类列表删除某个分类
    public function delCategory(){

        $id=request()->param('id',0,"intval");
        $status=request()->param('status',0,'intval');

        if($status != config("status.mysql.table_adminUser_delete")){
            return  show(config("status.error"),'删除状态码不符');
        }
        $data=[
            'status'        =>          $status,
            'update_time'   =>          time()
        ];
        try{
            $delCtegoryResult=(new AdminCategory())->delCtegoryBus($id,$data);
        }catch(Exception $e){
            return show(config("status.error"),'删除失败');
        }
        
        if($delCtegoryResult){
            return show(config("status.success"),'删除成功');
        }
        return show(config("status.error"),'删除失败');
    }

    //编辑页面  渲染
    public function CategoryEdit()
    {
        $id=request()->param('id',0,"intval");
        // dump($id);
        $editCategoryResult=(new AdminCategory())->editCategoryBus($id);
        if(!$editCategoryResult){
            return show(config("status.error"),'没有获取到数据');
        }
        // dump($editCategoryResult['pid']);die();
        if($editCategoryResult['pid']!=0){
            $Result=(new AdminCategory())->editCategoryByPidBus($editCategoryResult['pid']);
            //  dump($Result['name']);die();
            View::assign([
                'editResultName'        =>      $Result['name']
            ]);
        }
        try {
            $category = (new AdminCategory())->getNormalCategory();
        } catch (Exception $e) {
            $category = [];
        }
        View::assign([
            'editCategoryResult'  =>   $editCategoryResult,
            'category'  => json_encode($category),
            ]);
        // dump($id);die();
        return view::fetch();
    }
    //编辑页面  更新数据
    public function updateCategory()
    {
        $updateAllData = request()->param();
        $id=$updateAllData['id'];
        if(empty($updateAllData)){
            return show(config("status.error"),'请求出错');
        }
        // if(!(request()->isPost( $updateAllData))){
        //     return show(config("status.error"),'请求方式错误');
        // }
        
        $data=[
            'pid'               =>          $updateAllData['pid'],
            'name'              =>          $updateAllData['name'],
            'operation_user'    =>          $updateAllData['operation_user'],
            'status'            =>          $updateAllData['status'],
            'listorder'         =>          $updateAllData['listorder']
        ];
        $validata   = (new valiCategory())->scene('categoryUpdate');
        if(!$validata->check($data)){
            return show(config("status.error"),$validata->getError());
        }
       
        try{
            $updateResult=(new AdminCategory())->updateCategoryBus($data,$id);
        }catch(Exception $e){
            throw new Exception("更新出错", config("status.error"));
        }
        // return show(0, 0,$updateResult);
        if($updateResult){
            return show(config("status.success"),'更新成功');
            
        }
        return show(config("status.error"),'更新失败');
        
    }
    public function returnUpperLevel()
    {
        $id = request()->param('id', 0, 'intval');
        dump($id);
    }

    //商品添加   商品分类选择按钮
    public function dialog()
    {
       $dialogResult = (new AdminCategory())->getNormalByIdBus();
        // dump($dialogResult);
        // View::assign([
        //     'category'     =>      json_encode($dialogResult)
        // ]);
        // return view::fetch('goods/index');
        return view("",['categorys'     =>      json_encode($dialogResult)]);
    }

    //商品添加   商品分类选择按钮  一级分类  通过父id查找 子类的 pid
    public function getByPid()
    {
        $pid=$this->request->param('pid','0',"intval");
        $categoryRes=(new AdminCategory())->getChilrenByIdBus($pid);
        return show(config("status.success"),'OK',$categoryRes);
    }
  }
