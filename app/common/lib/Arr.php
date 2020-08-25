<?php

namespace app\common\lib;

class Arr
{
    /**
     * 无限分类树、
     * 第一条foreach  就是简单的将  id作为数组的键，第二条foreach  先将数组遍历循环，通过if  和 isset筛选数组元素中的pid值，是否有和id相同的元素，
     * 不存在键id数值的数组（不存在的都是最高级分类，一般来说），如果有则进入else ，当查找到有数组元素的pid值  和   键值为  pid值的  元素时，则找到
     * 那个键值等于元素pid的元素，将  pid元素 等于键值 的pid  添加到   键值  id   的  list数组中去
     */
    /**
     * 分类树  支持无极限分类
     */
    public static function getTree($data)
    {
        $items = array();
        foreach ($data as $v) {
            $items[$v['category_id']] = $v;
        }
        $tree = [];
        foreach ($items as $id => $item) {
            if (isset($items[$item['pid']])) {
                $items[$item['pid']]['list'][] =& $items[$id];
            } else {
                $tree[] =& $items[$id];
            }
        }
        return $tree;
    }

    //限制  一级  二级  三级 栏目的输出
    public static function sliceTreeArr($data, $firstCount = '5', $secondCount = '3', $threeCount = '3')
    {
        $data = array_splice($data, 0, $firstCount);

        foreach ($data as $k => $v) {
            if (!empty($v['list'])) {
                $data[$k]['list'] = array_splice($v['list'], 0, $secondCount);
                foreach ($v['list'] as $kk => $vv) {
                    if (!empty($vv['list'])) {
                        $data[$k]['list'][$kk]['list'] = array_splice($vv['list'], 0, $threeCount);
                    }
                }
            }
        }
        return $data;
    }

    //分页返回为空的方法
    public static function defaultPage($num)
    {
        $result = [
            "total" => 5,
            "per_page" => 5,
            "current_page" => 1,
            "last_page" => 1,
            "data" => []
        ];
        return $result;
    }

    //无限分类
    public function wxClass($data)
    {
        $items = [];
        foreach ($data as $k => $v) {
            $items[$v['id']] = $v;
        }
        $tree = [];
        foreach ($items as $key => $val) {
            if (isset($items[$val['pid']])) {
                $items[$val['pid']]['list'][] =& $items[$key];
            } else {
                $tree[] =& $items[$key];
            }
        }
        return $tree;
    }
}
