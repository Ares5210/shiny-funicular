<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 19:03
 */

namespace comm;

class WLogic{

    public $request = null;

    public function __construct()
    {
        $this->request = new Request();
    }

}
