<?php

/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/25
 * Time: 19:21
 */
namespace logic;

use comm\WechatComm;
use comm\WLogic;

class WechatLogic extends WLogic
{
    public $wechatComm = null;

    public function run(){
        $this->wechatComm = new WechatComm();
    }

}