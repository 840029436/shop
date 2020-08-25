<?php 
namespace app\admin\controller;

use app\BaseController;

class Image extends BaseController{

    public function upload()
    {
        // dump($_FILES);die();
        if(!$this->request->isPost()){
            return show(config("status.error"),'请求不合法');
        }   
         // 获取表单上传的文件 例如上传了001.jpg
        $file=$this->request->file('file');
        // 上传到本地服务器   disk()方法  是移动到public目录中  返回的值是图片所在的地址
        $savename = \think\facade\Filesystem::disk('public')->putFile( 'upload/image', $file);
        if(!$savename){
            return show(config("status.error"),'上传图片失败');
        }
        
        $imageUrl=[
            'image'     =>     '/storage/'.$savename  
        ];
        return show(config("status.success"),'图片上传成功',$imageUrl);
    }
    public function layuiUpload()
    {
          // dump($_FILES);die();
        if(!$this->request->isPost()){
            return show(config("status.error"),'请求不合法');
        }   
         // 获取表单上传的文件 例如上传了001.jpg
        $file=$this->request->file('file');
        $savename = \think\facade\Filesystem::disk('public')->putFile( 'upload/image', $file);
        if(!$savename){
            return json(['code'=>1,'data'=>[]],200);
        }
        $result=[
            "code"      =>0,
            "data"      =>[
                "src"   =>'/storage/'.$savename
            ]
            ];
        return  json($result,200);
    }
}
?>