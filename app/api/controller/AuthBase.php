<?php

namespace app\api\controller;

use app\BaseController;

/**
 * Undocumented class
 * 这个是需要登陆才能访问的页面，所有需要登录的页面都要继承这个类
 */
class AuthBase extends ApiBase
{
    public  $username = '';
    public  $userid = '';
    public $accessToken = '';
    public function initialize()
    {
        parent::initialize();
        $this->accessToken = $this->request->header('Access-Token');
        //dump($this->isLogin());
        $isLogin = $this->isLogin();
        if (!$this->accessToken ||  !$isLogin) {
            return $this->show(config("status.not_login"), "没有登录");
        }
    }
    /**
     * Undocumented function
     *
     * @return boolean
     * 判断用户是否登录
     */
    public function isLogin()
    {
        $userInfo = cache(config("redis.token_pre") . $this->accessToken);
        if (!$userInfo) {
            return false;
        }
        if (empty($userInfo['id']) && empty($userInfo['name'])) {

            return false;
        }
        $this->username = $userInfo['username'];
        $this->userid = $userInfo['id'];
        return true;
    }
}
