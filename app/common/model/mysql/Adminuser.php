<?php 
namespace app\common\model\mysql;

use think\Model;

class Adminuser extends Model{

    ////根据用户名获取用户信息
    public function getAdminUserByUserName($username)
    {
        if(empty($username)){
            return false;
        }
        //根据用户名获取用户信息
        $where=[
            'user_name'     =>      $username
        ];
        $result=$this->where($where)->select();

        return $result;
        
    }
        //根据主键id更新用户信息
    public function upDateAdminUserById($id,$data)
    {
        $id=intval($id);
        if(empty($id) || empty($data) || !is_array($data)){

            return false;
        }
        $where=[
            'id'        =>      $id
        ];
        $result=$this->where($where)->save($data);

        return $result;
    }
}
?>