<?php

declare(strict_types=1);

namespace app\api\controller;

use app\BaseController;
use app\api\validate\User;
use app\common\business\ApiUserLogin;

class Login extends BaseController
{

    public function index()
    {

        if (!$this->request->isPost()) {

            return show(config("status.error"), '请求方式错误');
        }
        $phoneNumber = $this->request->param('phone_number', '', 'intval');
        $code = $this->request->param('code', '', 'intval');
        $type = $this->request->param('type', '', 'intval');

        $data = [
            'phone_number'      =>      $phoneNumber,
            'code'              =>      $code,
            'type'              =>      $type
        ];


        $validate = new User();
        if (!$validate->scene('login')->check($data)) {

            return show(config("status.error"), $validate->getError());
        }

        $result = (new ApiUserLogin())->login($data);

        if ($result) {
            return show(config("status.success"), '登录成功', $result);
        }
        return show(config("status.error"), '登录失败');
    }
}
