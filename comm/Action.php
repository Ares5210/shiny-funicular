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
        if (!TYPE) {
            $this->execute = new \logic\AuthLogic();
        } else {

        }

        return $this->execute->run();
    }
}