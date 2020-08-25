<?php

namespace app\common\business;

use app\common\model\mysql\Category;
use Exception;

class AdminCategory
{
    public $model = null;

    public function __construct()
    {
        $this->model = new Category();
    }

    //添加分类
    public function add($data, $name)
    {
        $result = $this->model->getCategoryByName($name);
        if ($result) {
            throw new Exception('不可重复分类名称');
        }
        $data['status'] = config('status.mysql.table_adminUser_normal');
        try {
            $this->model->save($data);
        } catch (Exception $e) {
            throw new Exception("服务内部异常");
        }

        return $this->model->id;
    }

    //通过正常的状态  获取id, name , pid 的字段
    public function getNormalCategory()
    {
        $field = "id,name,pid";
        $categorys = $this->model->getNormalCategoryByIdNamePid($field);

        if (!$categorys) {
            return $categorys = [];
        }
        $category = $categorys->toArray();
        return $category;
    }

    //与上方一致
    public function getNormalCategoryAs()
    {
        $field = "id as category_id,name,pid";
        $categorys = $this->model->getNormalCategoryByIdNamePid($field);

        if (!$categorys) {
            return $categorys = [];
        }
        $category = $categorys->toArray();
        return $category;
    }

    //对分类列表的   数据显示 
    //将 显示父分类下有几个子分类，通过pid == id 的个数count  建立一个关联数组 使这个字段的key为查询字段的pid  value  为子字段的个数  ,建立这样的联系
    //然后动态的向数据库添加一个字段，  
    public function getNormalCategoryList($data, $num)
    {
        $CategoryList = $this->model->getCategoryAllByPid($data, $num);
        // throw new Exception("Error Processing Request");

        // dump($CategoryList);
        if (!$CategoryList) {
            return [];
        }
        $CategoryLists = $CategoryList->toArray();
        //render   thinkphp  自带的分页代码
        $CategoryLists['render'] = $CategoryList->render();

        $arrayId = array_column($CategoryLists['data'], 'id');
        $resultChild = $this->model->getChildCountInPid(['pid' => $arrayId]);
        // dump($resultChild->toArray());die();     
        $resultChilds = $resultChild->toArray();
        $idCounts = [];
        foreach ($resultChilds as $countResult) {

            $idCounts[$countResult['pid']] = $countResult['count'];
        }

        //  dump($idCounts);
        if ($CategoryLists['data']) {
            foreach ($CategoryLists['data'] as $k => $val) {
                //   dump($val['id']);
                $CategoryLists['data'][$k]['childCount'] = $idCounts[$val['id']] ?? 0;
            }
            //  dump($CategoryLists);
        }

        return $CategoryLists;
    }
    //修改 排序  状态码
    //business   gettype  获取对象类型
    public function alterCategoryList($id, $data)
    {
        $result = $this->model->alterById($id, $data);
        if ($result) {
            return true;
        }
        return false;
    }

    //删除 分类列表中的某一个分类   与controller层  delCtegory   对应
    public function delCtegoryBus($id, $status)
    {

        $result = $this->model->getById($id);
        $result = $result->toArray();
        if ($result['status'] == config("status.mysql.table_adminUser_delete")) {
            return show(config("status.errot"), '删除错误，此分类已不存在');
        }
        $delResult = $this->model->alterById($id, $status);

        if ($delResult) {
            return true;
        }
        return false;
    }

    public function editCategoryBus($id)
    {
        $editCategory = $this->model->getById($id);
        if (!$editCategory) {
            return show(config("status.error"), "内部服务出错");
        }
        $editCategory = $editCategory->toArray();
        return $editCategory;

    }

    public function editCategoryByPidBus($pid)
    {
        $result = $this->model->getPidById($pid);
        if ($result) {
            return $result->toArray();
        }
        return false;
    }

    //更新 Category  编辑  
    public function updateCategoryBus($data, $id)
    {
        try {
            $updateResultB = $this->model->categoryUpdateM($data, $id);
        } catch (Exception $e) {
            return show(config("status.error"), '更新出错');

        }
        // halt($updateResultB);die();
        if (!$updateResultB) {
            return show(config("status.error"), '更新失败');
        }
        return 1;
    }

    //商品添加   商品分类  选择按钮
    public function getNormalByIdBus($pid = 0, $field = 'id,name,pid')
    {
        try {
            $res = $this->model->getNomalByIdModel($pid, $field);
        } catch (Exception $e) {
            return [];
        }

        $res = $res->toArray();
        return $res;
    }

    //商品添加   商品分类选择按钮  一级分类  通过父id查找 子类的 pid
    public function getChilrenByIdBus($pid)
    {
        try {
            $res = $this->model->getChilrenByIdModel($pid);
        } catch (Exception $e) {
            return [];
        }
        $res = $res->toArray();
        return $res;
    }
    //api  头部  按照分类搜索未完成
    //按商品分类  功能 搜索
    public function getCategorySearch($id)
    {
        static $data = array();
        $resultCategory = array();
        $field = "id as category_id,name,pid";
        $firstLevel = $this->model->getCategorySearchByIdModel($id, $field);
        $firstLevel = $firstLevel->toArray();
        if ($firstLevel['pid'] != 0) {
            $this->getCategorySearch($firstLevel['pid']);
        }
        $subCategory = $this->obtainSubCategoryById($firstLevel['category_id']);
        foreach ($subCategory as $k => $v) {
            $resultCategory[] = $this->obtainSubCategoryById($v['category_id']);
        }

        $result = array_reduce($resultCategory, 'array_merge', array());
//        $items = array();
//        foreach ($result as $v) {
//            $items[$v['pid']] = $v;
//        }
//        halt($items);
//        foreach ($subCategory as $key => $val){
//            foreach ($items as $k => $v){
//                if($val['category_id']==$k ){
//                    $subCategory[$key]['list'][]=$v;
//                    unset($items[$k]);
//                }
//            }
//        }
        $firstLevel['list'][] = $subCategory;
        array_push($firstLevel['list'], $result);
        $data[] = $firstLevel;
        $d=$data[0];
        $dataResult['focus_ids']=[1, 11];
        return $d;

    }

    //通过id获取子分类
    public function obtainSubCategoryById($id)
    {
        $field = "id as category_id,name,pid";
        $secondData = $this->model->getSubCategoryData($id, $field);
        return $secondData->toArray();
    }

}
