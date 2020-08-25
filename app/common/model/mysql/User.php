<?php

namespace app\common\model\mysql;

use think\Model;

class User extends Model
{

    protected $autoWritestamp = true;
    ////根据用户名获取用户信息
    public function getUserByPhoneNumber($phoneNumber)
    {

        if (empty($phoneNumber)) {
            return false;
        }
        //根据用户名获取用户信息
        $where = [
            'phone_number'     =>      $phoneNumber
        ];
        $result = $this->where($where)->find();

        return $result;
    }
    //根据主键id更新用户信息
    public function upDateUserById($id, $data)
    {
        $id = intval($id);
        if (empty($id) || empty($data) || !is_array($data)) {

            return false;
        }
        $where = [
            'id'        =>      $id
        ];
        $result = $this->where($where)->save($data);

        return $result;
    }
    public function getUserById($id)
    {
        $id = intval($id);
        if (!$id) {
            return false;
        }
        return $this->find($id);
    }

    public function getUserByUsername($username)
    {

        if (empty($username)) {
            return false;
        }
        //根据用户名获取用户信息
        $where = [
            'phone_number'     =>      $username
        ];
        $result = $this->where($where)->find();

        return $result;
    }
}
