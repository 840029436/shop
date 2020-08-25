<?php

namespace app\common\business;

use app\common\model\mysql\User;
use app\common\lib\Str;
use app\common\lib\Time;

class ApiUserLogin
{

    public $userObj = null;

    public function __construct()
    {
        $this->userObj = new  User();
    }
    public function login($data)
    {

        $redisCode = cache(config("redis.code_pre") . $data['phone_number']);

        if (empty($redisCode) || $redisCode != $data['code']) {

            throw new \think\Exception('不存在该验证码', -1009);
        }

        //判断数据库表是否有用户记录   phoneNumber
        //生成token
        $user = $this->userObj->getUserByPhoneNumber($data['phone_number']);
        // dump($user['id']);die();
        if (empty($user)) {
            $username = '小竹' . $data['phone_number'];
            $userData = [

                'username'      =>      $username,
                'phone_number'  =>      $data['phone_number'],
                'type'          =>      $data['type'],
                'status'        =>      config("status.mysql.table_adminUser_normal"),

            ];
            try {
                $this->userObj->save($userData);
                //$userId=$user->id;

            } catch (\Exception $e) {
                throw new \think\Exception("数据库内部异常");
            }
        } else {
            $logindata = [
                'update_time'       =>      time(),
                'login_ip'          =>      request()->ip(),
            ];

            $result = $this->userObj->upDateUserById($user['id'], $logindata);
            $userId = $user->id;
            $username = $user->username;
            // dump($userId);die();
            if (!$result) {
                return false;
            }
        }
        $redisData = [

            'id'        =>      $userId,
            'username'  =>      $username
        ];
        //获取token   并缓存
        $token = Str::getLoginToken($data['phone_number']);
        // dump(config("redis.token_pre").$token);die();
        $res = cache(config("redis.token_pre") . $token, $redisData, Time::userLoginExpiresTime());

        return $res ? ["token"  =>  $token, "username" => $username] : false;
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * 返回正常用户的数据
     */
    public function getNormalUserById($id)
    {
        $user = $this->userObj->getUserById($id);
        if (!$user || $user->status != config("status.mysql.table_adminUser_normal")) {
            return [];
        }
        return $user->toArray();
    }
    //判断用户名是否存在
    public function getNormalUserByUsername($username)
    {
        $user = $this->userObj->getUserByUsername($username);
        if (!$user || $user->status != config("status.mysql.table_adminUser_normal")) {
            return [];
        }
        return $user->toArray();
    }
    /**个人中心  数据更新 */
    public function update($id, $data)
    {
        $userResult = $this->getNormalUserByUsername($data['username']);
        if ($userResult && $userResult['id'] != $id) {
            throw new \think\Exception("该用户已经存在请重新输入");
        }
        return $this->userObj->upDateUserById($id, $data);
    }
}
