<?php 
namespace app\common\model\mysql;

use think\Model;

/**
 * Undocumented class
 * 模型的名称要与数据库表名称相对应
 */
class User extends Model{
    //可以在控制器层 进行对应的调用状态  user_id 就是对应的键，调用方式 去前去尾取中间
    public function getStatusTextAttr($value,$data){
        $status=[
             0=>'待审核',
             1=>'正常',
             2=>'非正常',
             6=>'审核中',
             99=>'删除'
        ];
        return $status[$data['user_id']];
    }
    public function  getUserDataByUser_id($user_id,$limt=10){
        //查询出来的是一个对象
        $result=$this->where('user_id',$user_id)
                    ->limit($limt)
                    ->order('user_id','desc')
                    ->select()
                    //加toArray() 将对象转化为数组
                    ->toArray();

            return $result;
        }
}
?>