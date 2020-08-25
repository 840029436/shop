<?php 
namespace app\common\business;
use app\common\model\mysql\GoodsSku as GoodsSkuModel;


class GoodsSkuBus {

    public $model = NULL;

    public function __construct()
    {
        $this->model = new GoodsSkuModel();
    }
    /**
     * 批量新增逻辑
     */
    public function saveAll($data){
        if(!$data['skus']){
            return false;
        }
        foreach($data['skus'] as $value){
            $insertData[] = [
                "goods_id" => $data['goods_id'],
                "specs_value_ids" => $value['propvalnames']['propvalids'],
                "price" => $value['propvalnames']['skuSellPrice'],
                "cost_price" => $value['propvalnames']['skuMarketPrice'],
                "stock" => $value['propvalnames']['skuStock'],
            ]; 
        }
        try {
            $result = $this->model->saveAll($insertData);
            //  dump($result->toArray());exit;
            return $result->toArray();
            
        }catch (\Exception $e) {
            ///echo $e->getMessage();exit;
            // 记录日志
            return false;
        }
        return true;
    }

    public function unified($data)
    {
         $price = $data['market_price'];
         $cost_price = $data['sell_price'];
        
        //  dump(gettype($price). gettype($cost_price) );exit;
        $insertData=[
            "goods_id" => $data['goods_id'],
            "specs_value_ids" => '0,0',
            "price" => $price,
            "cost_price" => $cost_price,
            "stock" => $data['stock'],
        ];
        // dump($insertData);exit;
        try {
            $result = $this->model->save($insertData);
            // dump(gettype($result));exit;
            $res=$this->model->id;
            // dump($res);exit;
             return $res;
            
        }catch (\Exception $e) {
            ///echo $e->getMessage();exit;
            // 记录日志
            return false;
        }
        return true;
    }
    
}
?>