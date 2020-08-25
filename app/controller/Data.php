<?php 
namespace app\controller;

use app\BaseController;
use think\facade\Db; 
use app\model\User;


/**
 * Undocumented class
 * sql  可以使用fetchsql（） 方法在页面打印出SQL语句 
 * Db::getLastsql()  方法在页面打印出SQL语句
 * value()  取出某一个字段
 * select() 取出字段的数据集合
 * 
 */
class Data extends BaseController{
    public function index(){
        $result=Db::table('user')
        ->where([
            ['user_id','>',1],
            ['age','<',25]
        ])
        ->value('name');
        echo Db::getLastSql(); exit;
        return $result;
    }
    public function insert(){
        $data=[
            'user_id'=>'4',
            'name'   =>'狒狒',
            'age'   =>18,
            'email'  =>'xx@xx.com',
            'password'=>md5('123456')
        ]; 
        $result=Db::table('user')->insert($data);
        echo Db::getLastSql();exit;
        dump($result);
    }
    public function model1(){
        $result=User::where('user_id',1)->find();
        dump($result->toArray());
    }
    public function model2(){
        $model=new User();
        $data=$model->where('user_id','>','1')
                ->limit(0,2)
                ->order('age','DESC')
                ->select();
                
        foreach($data as $result){
            dump($result['name']);
            dump($result->statustext);
            
        }
    }
}
?>