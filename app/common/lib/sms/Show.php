<?php


namespace app\common\lib\sms;


class Show
{
    public static function  success($data=[],$message='ok')
    {
        $result=[
            'status'        =>      config("status.success"),
            'message'       =>      $message,
            'result'        =>      $data
        ];
        return json($result);
    }


    public static function  error($status=0,$message='error',$data=[])
    {
        $result=[
            'status'        =>      $status,
            'message'       =>      $message,
            'result'        =>      $data
        ];
        return json($result);
    }

}