<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 16:02
 */

namespace helpers;

use config\WConst;

/**
 * 工具类
 * Class Functions
 * @package helpers
 */
class Functions
{

    /**
     * 模拟 Post/Get 请求
     * @param String $url 请求URl
     * @param Array $info 携带数据
     * @param int $timeout 超时时间
     * @return mixed
     */
    public static function curlRequest($url = '', $info = array(), $timeout = 30)
    { // 模拟提交数据函数
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); // 设置超时限制防止死循环
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
        }
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        if (!empty($info)) {
            curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
            curl_setopt($curl, CURLOPT_POSTFIELDS, $info); // Post提交的数据包
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            error_log('Errno:' . curl_error($curl)); //捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据
    }

    /**
     * 检验signature的PHP示例代码
     * @param $signature
     * @param $timestamp
     * @param $nonce
     * @return bool
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public static function checkSignature($signature,$timestamp,$nonce)
    {
        $token = WConst::TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

}
