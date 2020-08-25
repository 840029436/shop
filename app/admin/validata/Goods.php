<?php
namespace app\admin\validata;

use think\Validate;

class Goods extends Validate{

    protected  $rule=[
        'id'                                =>          ['integer','require'],
        'is_index_recommend'                =>           ['integer','require']
    ];
    protected  $message=[
        'id.integer'                         =>      "id只能为整数",
        'id.require'                         =>      "id不为空",
        'is_index_recommend.integer'        =>      "is_index_recommend只能为整数",
        'is_index_recommend.require'        =>      "is_index_recommend不为空"
    ];
    protected  $scene=[
        'idVali'        =>      ['id','is_index_recommend']
    ];
}