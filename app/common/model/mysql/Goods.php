<?php

namespace app\common\model\mysql;

use think\Model;

class Goods extends Model
{

    protected $autoWriteTimestamp = true;

    public function updateById($goods_id, $goodsUpdateData)
    {
        $data['update_time'] = time();
        return $this->where('id', $goods_id)->save($goodsUpdateData);
    }

    //分类列表页
    public function getLists($listKey, $data, $num)
    {
        $order = [
            'listorder' => 'DESC',
            'id' => 'DESC'
        ];

        if (!empty($listKey)) {

            //搜索器
            $res = $this->withSearch($listKey, $data);
            dump(111);
        } else {
            $res = $this;
        }
        $list = $res->whereIn("status", [0, 1])->order($order)->paginate($num);
        // echo $this->getLastSql();exit;
        return $list;
    }

    public function searchTitleAttr($query, $value)
    {
        $query->where('title', 'like', '%' . $value['title'] . '%');
    }


    public function searchCreateTimeAttr($query, $value)
    {
        $query->whereBetweenTime('create_time', $value[0], $value[1]);
    }

    //修改推荐 前判断此纪录中的是否存在  图片
    public function existsImageById($recommendId)
    {
        $where = [
            'id' => $recommendId
        ];
        return $this->where($where)->value('big_image');
    }

    //修改是否推荐
    public function getRecommendById($recommendId, $is_index_recommend)
    {
        $where = [
            'id' => $recommendId
        ];
        $is_index_recommend = [
            'is_index_recommend' => $is_index_recommend
        ];
        return $this->where($where)->save($is_index_recommend);
    }

//    获取推荐商品的 图片等信息
    public function getPathImageByRecommend($limit, $field)
    {
        $where = [
            'is_index_recommend' => 1,
            'status' => config("status.mysql.table_adminUser_normal")
        ];
        $order = [
            'listorder' => 'DESC',
            'id' => 'DESC'
        ];

        return $this->where($where)->order($order)->limit($limit)->field($field)->select();
    }

    //站点中图片  获取器
    public function getImageAttr($value)
    {
        return request()->domain() . $value;
    }

    //首页商品推荐
    public function getNormalGoodsFindInSetCategoryIdModel($categoryId, $field, $limit = 10)
    {
        $order = [
            'listorder' => "DESC",
            'id' => "DESC"
        ];
//        $a=$this->where('id','exp',' IN (1,3,8) ')->select();
//        echo $this->getLastSql(); exit;
        $result = $this->whereFindInSet("category_path_id", $categoryId)
            ->where("status", "=", config("status.mysql.table_adminUser_normal"))
            ->order($order)
            ->field($field)
            ->limit($limit)
            ->select();
//        echo $this->getLastSql(); exit;
        return $result;
    }

}
