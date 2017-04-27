<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 17:42
 */

namespace config;

class WConst
{
    // TOKEN存储地址
    const TOKEN_FILE = (__DIR__) . DIRECTORY_SEPARATOR . 'access_token.json';

    // 微信认证时所需要的token
    const TOKEN = 'pBm0jPbmZZWCUcnnh6ukSHPgpMzHM6qR';

    // 账号信息
    const APPID = 'wxa24f287d5fb454d5';
    const APPSECRET = '1de52d7520e912347450868c5c7ac090';

    // 微信获取 token URL
    const WECHAR_TOKEN_URL = 'https://api.weixin.qq.com/cgi-bin/token';
}
