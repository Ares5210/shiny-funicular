<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/25
 * Time: 19:27
 */

namespace comm;

use config\WConst;
use helpers\Functions;

class WechatComm{

    /**
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/25
     */
    public function getAccessToken($wThis){
        $params = [
            'grant_type' => 'client_credential',
            'appid' => WConst::APPID,
            'secret' => WConst::APPSECRET
        ];
        $res = Functions::curlRequest(WConst::WECHAR_TOKEN_URL,$params);
        if(($resObject = json_decode($res)) &&  isset($resObject->access_token)){
            $wThis->accessToken = $resObject->access_token;
            $resObject->expiration_time = $resObject->expires_in + time();
            file_put_contents(WConst::TOKEN_FILE,json_encode($resObject));
        }
    }

}