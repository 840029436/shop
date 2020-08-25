<?php 
namespace app\admin\validata;

use think\Validate;

class SpecsValue extends Validate{

    protected $rul=[

        'id'        =>      ['require','integer'],
        'name'      =>      'require'
    ];

    protected $message=[

        'id.require'        =>      'id不为null',
        'id.integer'        =>      'id必须是整数',
        'name.require'      =>      'name不为空'
    ];

    protected $scene=[

        'specsValueIdName'  =>      ['id','name']
    ];
} 
?>