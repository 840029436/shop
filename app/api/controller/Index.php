<?php


namespace app\api\controller;

use app\common\business\GoodsBus;
use app\common\lib\sms\Show;

class Index extends ApiBase
{
    //首页  banner图片轮播
    public function getRotationChart()
    {
        $goodsResult1 = (new GoodsBus())->getRotationChart($limit = 5);
        return Show::success($goodsResult1);
    }

    //首页商品推荐
    public function categoryGoodsRecommend()
    {
        $categoryId = [
            13, 28
        ];
        $result = (new GoodsBus())->categoryGoodsRecommendBus($categoryId);
//        halt($result);
        return Show::success($result);
    }
}