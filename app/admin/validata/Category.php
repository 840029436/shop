<?php

namespace app\admin\validata;

use think\Validate;

class Category  extends Validate
{
    protected $rule = [
        'pid'                    =>          'require',
        'name'                   =>          'require',
        'listorder'              =>          'integer',
        'id'                     =>          ['integer','require'],
        'status'                 =>          ['number', "in" => "0,1"],
        'operation_user'         =>          'require'
    ];

    protected $message = [
        'parent.require'         =>             '父类不得为空',
        'name.require'           =>              '所属分类名称不得为空',
        'listorder.integer'      =>              '排序只能为整数',
        'id.integer'             =>              'id只能为整数',
        'idrequire'              =>                 'id不为空',
        'status.in'              =>               '状态码只能为0或1',
        'operation_user.require' =>               '操作者不为空'
    ];
    protected $scene    =[
        'categoryListOrder'      =>         ['listorder','id'],
        'categoryStatus'         =>         ['id','status'],
        'categoryChild'          =>         ['id'],
        'categoryUpdate'        =>         ['name','operation_user','status','listorder','pid'],
        'categorysave'         =>          ['pid','name']
    ];

}
