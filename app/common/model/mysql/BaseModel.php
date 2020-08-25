<?php
namespace app\common\model\mysql;

use think\Model;

class BaseModel extends Model{

    //自动写入  时间
    protected $autoWriteTimestamp=true;
    //公共方法 ，通过id更新 数据
    public function updateById($goods_id, $goodsUpdateData)
    {
        $data['update_time']   =  time();
        return $this->where('id',$goods_id)->save($goodsUpdateData);
    }
}
?>