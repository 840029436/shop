<?php 
declare(strict_types=1);
namespace app\common\lib\sms;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use think\facade\Log;

class Alisms  implements SmsBase{
/**
 * Undocumented function
 *
 * @param string $phone
 * @param integer $code
 * @return boolean
 * 阿里云发送短信验证
 */
    public static function sendCode(string $phone ,int $code) : bool {

        if(empty($phone) || empty($code)){
            
            return false;
        }
        
        AlibabaCloud::accessKeyClient(config("Aliyun.accessKeyId"), config("Aliyun.accessSecret"))
        ->regionId(config("Aliyun.regionId"))
        ->asDefaultClient();

        $template_param=[
            'code'      =>      $code
        ];
        try {
        $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host(config("Aliyun.host"))
                ->options([
                                'query' => [
                                'RegionId' => config("Aliyun.regionId"),
                                'PhoneNumbers' => "$phone",
                                'SignName' => config("Aliyun.SignName"),
                                'TemplateCode' => config('Aliyun.TemplateCode'),
                                'TemplateParam' => json_encode($template_param),
                                ],
                            ])
                ->request();
            Log::info("alisms-sendCode-{$phone}-result".json_encode($result->toArray()));                            
        // print_r($result->toArray());
        } catch (ClientException $e) {
            Log::Error("alisms-sendCode-{$phone}-Exception".$e->getErrorMessage());
            return false;
            // echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            Log::Error("alisms-sendCode-{$phone}-Exception".$e->getErrorMessage());
            return false;
            // echo $e->getErrorMessage() . PHP_EOL;
        }
        if(isset($result['Code']) && $result['Code']=='OK'){

            return true;
        }
            return false;
    }
}
?>