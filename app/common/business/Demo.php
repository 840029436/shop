<?php 
namespace app\common\business;

use app\common\model\mysql\user as mdeluser;
/**
 * Undocumented class
 * 业务逻辑层处理
 */
class Demo{

    public function getUserDataByUser_idCall($user_id,$limit=10){
        $model=new mdeluser();
        //查询出来的是一个对象
        $result=$model->getUserDataByUser_id($user_id);
        if(empty($result)){
            return [];
        }
        $user=config("user_id");
        foreach($result as $key =>$val){
            $result[$key]['user_name']=$user[$val['user_id']] ?? '其他';
        }
        return $result;
    }
}
?>