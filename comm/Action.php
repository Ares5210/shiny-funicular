<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 19:51
 */

namespace comm;

class Action{
    protected $execute = null;

    /**
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function run()
    {
        if (!TYPE) { // 认证模式
            $this->execute = new \logic\AuthLogic();
        } else { // 开发模式
            $this->execute = new \logic\WechatLogic();
        }

        return $this->execute->run();
    }
}