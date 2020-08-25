<?php

namespace app\api\controller;

use app\common\business\ApiUserLogin;
use app\api\validate\User as usercheck;
use think\facade\Cache;
use app\common\lib\Time;

class User extends AuthBase
{
    public function index()
    {
        $user = (new ApiUserLogin)->getNormalUserById($this->userid);
        $result = [
            'id'            =>          $user['id'],
            'username'      =>          $user['username'],
            'sex'           =>          $user['sex']
        ];
        return show(config("status.success"), 'OK', $result);
        //dump($user);
    }
    public function update()
    {
        $username = request()->param('username', '');
        $sex = request()->param('sex', '', "intval");
        $data = [
            'username'          =>          $username,
            'sex'               =>          $sex
        ];
        $validata = new  usercheck();
        $vali = $validata->scene('update_user');
        if (!$vali->check($data)) {
            return show(config("status.error"), $vali->getError());
        }
        // dump($validate);
        // ！-----------------------------------------------------------------------
        $user = (new ApiUserLogin)->update($this->userid, $data);
        if (!$user) {
            return show(config("status.error"), '更新失败');
        }
        $redisCache = [
            'id'        =>      $this->userid,
            'username'  =>      $username
        ];
        cache::set(config("redis.token_pre") . $this->accessToken, $redisCache, Time::userLoginExpiresTime());

        return show(config("status.success"), '更新成功');
    }
}
