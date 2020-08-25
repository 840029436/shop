<?php 
namespace app\api\validate;

use think\Validate;

class Ali_vertify extends Validate{

    protected $rule=[

        'phone_number'      =>      'require'
    ];

    protected $message=[

        'phone_number'      =>      '电话号码不能为空'
    ];

    protected $scene=[

        'scene_code'        =>      ['phone_number']
    ];
}
