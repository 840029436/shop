<?php 
namespace app\common\business;
class BaseBus
{
    /**
     * 新增逻辑
     */
    public function add($data) {
        $data['status'] = 1;
        // 根据name 查询 $name 是否存在 自行完成吧。
        try {
            
            $this->model->save($data);
        }catch (\Exception $e) {
            // 记录日志哦，便于后续问题的排查工作
            return 0;
        }

        // // 返回主键ID
        return $this->model->id;
    }

}
?>