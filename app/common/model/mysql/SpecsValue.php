<?php  
namespace app\common\model\mysql;
use think\Model;

class SpecsValue extends Model{

    protected $autoWriteTimestamp= true;
    public function getNormalBySpecsId($specs_id){

        $where=[
            'specs_id'      =>      $specs_id,
            'status'        =>      config("status.mysql.table_adminUser_normal")
        ];

        return $this->where($where)->select();
    }
}
?>