<?php 
namespace app\common\business;

use Exception;
use app\common\model\mysql\SpecsValue;

class SpecsValueBus {

    public $model = null;
    public function __construct()
    {
        $this->model = new SpecsValue();
    }
    public function getBySpecsId($specs_id)
    {
        try{
            $res=$this->model->getNormalBySpecsId($specs_id);
        }catch(Exception $e){
            return [];
        }
        $res=$res->toArray();

        return $res;
    }
    //规格搜索添加
    public function add($data)
    {
        $data['status']=config("status.mysql.table_normal");
        try{
            $this->model->save($data);

        }catch(Exception $e)
        {
            return false;
        }

        return $this->model->id;
    }
}
?>