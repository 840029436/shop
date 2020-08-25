<?php

declare(strict_types=1);

namespace app\api\controller;

use app\BaseController;
use app\api\validate\Ali_vertify;
use think\exception\ValidateException;
use app\common\business\Sms;

header('Access-Control-Allow-Origin:*');
// // 响应类型  
header('Access-Control-Allow-Methods:*');
// 响应头设置  
header('Access-Control-Allow-Headers:x-requested-with,content-type');

class Alisms extends BaseController
{

    public function code(): object
    {

        $phoneNumber = request()->param('phone_number', '', 'trim');

        $data = [

            'phone_number'      =>      $phoneNumber
        ];

        try {
            validate(Ali_vertify::class)->scene('scene_code')->check($data);
        } catch (ValidateException $e) {

            return show(config("status.error"), $e->getError());
        }
        //调用business 层
        if (Sms::sendCode($phoneNumber)) {

            return show(config("status.success"), '发送验证码成功');
        }
        return show(config("status.error"), '发送验证码失败');
    }
}
