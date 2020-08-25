<?php

namespace app\common\business;

use app\common\model\mysql\Goods as GoodsModel;
use app\common\model\mysql\GoodsSku as GoodsSkuModel;
use app\common\business\BaseBus;
use Exception;
use app\common\lib\Arr;
use app\common\model\mysql\Category;

class GoodsBus extends BaseBus
{
    public $model = NULL;

    public function __construct()
    {
        $this->model = new GoodsModel();
    }

    //商品添加页面   数据插入
    public function insertData($data)
    {
        //开启事务
        //  $this->model->startTrans();
        //  try{
        $goods_id = $this->add($data);

        if (!$goods_id) {

            return $goods_id;
        }

        if ($data['goods_specs_type'] == 1) {
            $goodsSkuData = [
                'goods_id' => $goods_id
            ];

            $goodsSkuBusObj = new GoodsSkuBus();
            $data['goods_id'] = $goods_id;
            $res = $goodsSkuBusObj->unified($data);
            // dump($res);exit;
            if (!empty($res)) {
                $goodsUpdateData = [
                    "sku_id" => $res,
                ];
                $goodsRes = $this->model->updateById($goods_id, $goodsUpdateData);
                if (!$goodsRes) {
                    throw  new \think\Exception("insertData:goods主表更新失败");
                }
            } else {
                throw new \think\Exception("sku表新增失败");
            }

        } elseif ($data['goods_specs_type'] == 2) {

            $goodsSkuBusObj = new GoodsSkuBus();
            $data['goods_id'] = $goods_id;
            $res = $goodsSkuBusObj->saveAll($data);
            // dump($goods_id);exit;
            // 如果不为空
            if (!empty($res)) {
                // 总库存
                $stock = array_sum(array_column($res, "stock"));
                $goodsUpdateData = [
                    "price" => $res[0]['price'],
                    "cost_price" => $res[0]['cost_price'],
                    "stock" => $stock,
                    "sku_id" => $res[0]['id'],
                ];
                // 执行完毕之后 更新 主表中的数据哦。
                $goodsRes = $this->model->updateById($goods_id, $goodsUpdateData);
                if (!$goodsRes) {
                    throw  new \think\Exception("insertData:goods主表更新失败");
                }
            } else {
                throw new \think\Exception("sku表新增失败");
            }

        }
        //     $this->model->commit();
        //  }catch(Exception $e){
        //     $this->model->rollback();
        //  }

        return true;
    }

    //商品列表页
    public function getLists($data, $num)
    {
        $listKey = [];
        if (!empty($data)) {
            $listKey = array_keys($data);
        }

        try {
            $list = $this->model->getLists($listKey, $data, $num);
            $list = $list->toArray();

        } catch (Exception $e) {
            $list = Arr::defaultPage($num);
        }

        return $list;
    }

    //admin  推荐功能修改
    public function changeRecommend($recommendId, $is_index_recommend)
    {
        try {
            $resultImage = $this->model->existsImageById($recommendId);
            if (empty($resultImage)) {
                return false;
            }
            $result = $this->model->getRecommendById($recommendId, $is_index_recommend);

        } catch (Exception $e) {
            return false;
        }
        if (!$result) {
            return false;
        }
        return true;

    }

    //api  首页大图推荐展示
    public function getRotationChart($limit)
    {
        $field = "sku_id as id ,title,big_image as image";
        try {

            $result = $this->model->getPathImageByRecommend($limit, $field);
            $result = $result->toArray();
        } catch (Exception $e) {
            return [];
        }
        return $result;
    }

    //首页商品推荐
    public function categoryGoodsRecommendBus($categoryIds)
    {
        if (!$categoryIds) {
            return [];
        }
        $result = [];
//        foreach ($categoryIds as $k => $categoryId) {
//            $result[$k]['categorys']=$this->getCategoryNoemalByCategoryId($categoryId);
//        }
        foreach ($categoryIds as $key => $categoryId) {
            $result[$key]['categorys'] = $this->getCategoryNoemalByCategoryId($categoryId);
//            halt($result);
            $result[$key]['goods'] = $this->getNormalGoodsFindInSetCategoryId($categoryId);
        }
//        $results = array_reduce($result, 'array_merge', array());
//        halt($result);
        return $result;
    }

    public function getNormalGoodsFindInSetCategoryId($categoryId)
    {
        $field = "sku_id as id , title , price , recommend_image as image";
        try {
            $result = $this->model->getNormalGoodsFindInSetCategoryIdModel($categoryId, $field);
        } catch (Exception $e) {
            return [];
        }
//        halt($result->toArray());
        return $result->toArray();

    }

    public function getCategoryNoemalByCategoryId($categoryId)
    {
        static $recursion=array();
        $field = "id category_id , name ,pid ";
        $result = (new Category())->getCategoryNormalByCategoryIdModel($categoryId, $field);
        $recursion[]=$result;
        if ($result['pid'] != 0) {
             $this->getCategoryNoemalByCategoryId($result['pid']);
        }
//        $secondLe= (new Category())->secondLevel($result['category_id'],$field);
//        $secondLe=$secondLe->toArray();
        $items=array();
        foreach ($recursion as $k => $v){
            $items[$v['category_id']]=$v;
        }
        $tree=[];
        foreach($items as $id => $item){
            if(isset($items[$item['pid']])){
                $items[$item['pid']]['list'][]=&$items[$id];
            }else{
                $tree[]=&$items[$id];
            }
        }

        $results = array_reduce($tree, 'array_merge', array());
//        $res=$results['list']=$secondLe;
//        halt($res);

        return $results;

//        $parentData=(new Category())->getParentDataModel($result['pid'],$field);
//        if($parentData['pid']!=0){
//            $parentData=(new Category())->getParentDataModel($result['pid'],$field);
//        }
//        $resultAgain=$parentData->toArray();
//        $results['category_id']=$result['category_id'];
//        $results['name']=$result['name'];
//        $resultAgain['list']=$results;
////        halt($resultAgain);
//        return $resultAgain;
    }
}
