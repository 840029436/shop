<?php

namespace app\api\validate;

use think\Validate;

class User extends Validate
{

    protected $rule = [
        'username'          =>      'require',
        'phone_number'      =>      'require',
        'code'              =>      'require| number ',
        'type'              =>      'require',
        'sex'               =>      ['number', "in" => "1,2,3"]
    ];

    protected $message = [

        'username'          =>      '用户名不为空',
        'phone_number'      =>      '手机号不为空',
        'code.require'      =>      '验证码不为空',
        'code.number'       =>      '验证码必须为数字',
        //'code.gt'         =>      '验证码长度不低于4位',
        'type.require'      =>      '类型不为空',
        //'type.in'           =>      '类型数值错误'
        'sex.require'       =>       '性别不为空',
        'sex.between'       =>      ' 性别数值错误'
    ];

    protected $scene = [

        'sence_code'        =>      ['phone_number'],
        'login'             =>      ['phhone_number', 'code', 'type'],
        'update_user'       =>      ['username', 'sex']
    ];
}
