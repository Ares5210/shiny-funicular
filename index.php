<?php
/**
 * 入口文件
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 15:43
 */

// 模式 [true 正常 | false 认证]
define('TYPE', false);

// 配置文件
$config = require(__DIR__ . './config/WConst.php');

// 引入文件
require(__DIR__ . './comm/autoload.php');
require(__DIR__ . './comm/Action.php');

(new \comm\Action())->run();