<?php
namespace app\admin\business;

use app\common\model\mysql\Adminuser;
use think\Exception;

class AdminLogin{
    
    public static function login($data){

        try{
            $adminUserObj= new Adminuser();
            $adminUser=self::getAdminUserByUserName($data['username']);

            if(empty($adminUser)){

                throw new Exception('不存在该用户');
            }
            
            if($adminUser[0]['password']!=md5($data['password'])){

                throw new Exception("密码错误");
               
            }
            $updateData=[
                'last_login_time'     =>      time(),
                'last_login_ip'       =>      request()->ip(),
                'update_time'         =>      time(),
                'operite_user'        =>      $adminUser[0]['operite_user']
            ];
            $res= $adminUserObj->upDateAdminUserById($adminUser[0]['id'],$updateData);
            
            if(empty($res)){
                
                throw new Exception("更新失败");
            }
        
        }catch(\Exception $e){
            //记录日志 $e->getMessage();
            throw new Exception("登录异常登录失败");
            
        }

            //记录session
            session(config("admin.session_admin"),$adminUser);

            return show(config("status.success"),'登录成功');

    }

    public static function  getAdminUserByUserName($username){

        $adminUserObj = new Adminuser();
            $adminUser=$adminUserObj->getAdminUserByUserName($username);
        
            if(empty($adminUser) || $adminUser[0]['status']!=config("status.mysql.table_adminUser_normal") ){
                
                return false;
            }
            $adminUser=$adminUser->toArray();
            return  $adminUser;
    }
}
?>