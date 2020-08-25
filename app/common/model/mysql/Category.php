<?php

namespace app\common\model\mysql;

use think\Model;

class Category extends Model
{
    //自动生成写入时间
    protected $autoWriteTimestamp = true;

    //根据分类名称查找数据
    public function getCategoryByName($name)
    {
        $where = [
            'name' => $name
        ];
        return $this->where($where)->find();
    }

    public function getNormalCategoryByIdNamePid($field = "*")
    {
        $where = [
            'status' => config("status.mysql.table_adminUser_normal")
        ];
        $order = [
            'listorder' => 'desc',
            'id' => 'desc'
        ];

        $result = $this->where($where)->field($field)->order($order)->select();
        return $result;
    }

    //分类列表  通过pid查询  数据
    public function getCategoryAllByPid($where, $num)
    {
        $order = [
            'listorder' => 'desc',
            'id' => 'desc'
        ];
        $result = $this->where("status", "<>", config("status.mysql.table_adminUser_delete"))->where($where)->order($order)->paginate($num);
        return $result;
    }

    //分类列表  通过pid查询  数据   某pid下面有多少子分类
    public function getChildCountInPid($arrayId)
    {

        $where[] = ['pid', "in", $arrayId['pid']];
        $where[] = ["status", "<>", config("status.mysql.table_adminUser_delete")];
        $res = $this->where($where)->field(['pid', "count(*) as count"])->group("pid")->select();
        // echo $this->getLastSql();exit();
        return $res;
    }

    //通过  id  对category列表  进行查询
    public function getById($id)
    {
        $where = [
            'id' => $id
        ];
        return $this->where($where)->find();
    }

    //通用     通过id,对分类数据进行修改
    public function alterById($id, $data)
    {
        $where = [
            'id' => $id
        ];
        return $this->where($where)->save($data);
    }

    //获取父类数据信息
    public function getPidById($pid)
    {
        $where = [
            'id' => $pid
        ];
        return $this->where($where)->find();
    }

    //更新  编辑
    public function categoryUpdateM($data, $id)
    {
        $where = [
            'id' => $id
        ];
        $update = $this->where($where)
            ->data($data)
            ->update();
        return $update;
    }

    //商品添加 -》 商品分类 选择按钮
    public function getNomalByIdModel($pid, $field)
    {
        $where = [
            'pid' => $pid,
            'status' => config("status.mysql.table_adminUser_normal")
        ];
        $order = [
            'listorder' => 'DESC',
            'id' => 'DESC'
        ];
        return $this->where($where)->order($order)->select();
    }

    //商品添加   商品分类选择按钮  一级分类  通过父id查找 子类的 pid
    public function getChilrenByIdModel($pid)
    {
        $where = [
            'pid' => $pid,
            'status' => config("status.mysql.table_adminUser_normal")
        ];
        $order = [
            'listorder' => 'DESC',
            'id' => 'DESC'
        ];
        return $this->where($where)->order($order)->select();
    }

    //api  商品首页推荐
    public function getCategoryNormalByCategoryIdModel($categoryId, $field)
    {
        $where = [
            'id' => $categoryId,
            "status" => config("status.mysql.table_adminUser_normal")
        ];
        $resultCategory = $this->where($where)->field($field)->find();
        return $resultCategory->toArray();
    }

    //通过pid获取父类数据
    public function getParentDataModel($pid, $field)
    {
        $where = [
            'id' => $pid,
            "status" => config("status.mysql.table_adminUser_normal")
        ];

        return $this->where($where)->field($field)->find();
    }

    //查找二级目录
    public function secondLevel($second, $field)
    {
        return $this->where('pid', '=', $second)->field($field)->select();
    }

    //按分类搜索 功能
    public function getCategorySearchByIdModel($id, $field)
    {
        $where = [
            'id' => $id
        ];
        return $this->where($where)->field($field)->find();
    }

    public function getSubCategoryData($category_id,$field)
    {
        $where=[
            'pid'       =>      $category_id
        ];
        return $this->where($where)->field($field)->select();
    }

}
