<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 17:48
 */

namespace logic;

use comm\WLogic;
use helpers\Functions;

class AuthLogic extends WLogic
{

    /**
     * 进行验证
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function run()
    {
        $signature = $this->request->get('signature', '');
        $timestamp = $this->request->get('timestamp', '');
        $nonce = $this->request->get('nonce', '');
        return Functions::checkSignature($signature, $timestamp, $nonce);
    }

}