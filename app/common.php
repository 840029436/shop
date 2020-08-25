<?php
// 应用公共文件
//通用api数据格式输出
function show($status, $message = 'error', $data = [], $httpStatus = 200)
{
    $result = [
        'status' => $status,
        'message' => $message,
        'result' => $data
    ];
    return json($result, $httpStatus);
}

/**
 * 无限分类-菜单
 * @param  $cate     array    分类数据
 * @param  $joinStr  string   连接符
 * @param  $pid      int      父ID
 * @param  $level    int      级别
 * @return array
 */
function treeMenu($cate, $joinStr = '|— ', $pid = 0, $level = 0)
{
    $arr = array();
    foreach ($cate as $k => $v) {
        if ($v['menu_parentid'] == $pid) {
            $joinStr = $level == 0 ? '' : '|-'; //判断是否是第一级分类
            $v['menu_level'] = $level + 1;
            $v['menu_name'] = $joinStr . $v['menu_name'];
            $arr[] = $v;
            unset($cate[$k]); //删除该节点，减少递归的消耗
            $arr = array_merge($arr, treeMenu($cate, $joinStr, $v['menu_id'], $level + 1));
        }
    }
    return $arr;
}
