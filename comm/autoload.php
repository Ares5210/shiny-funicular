<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 17:34
 */

class Autoload
{
    public static function getFile($class)
    {
        $file = (__FILE__) . $class . ".php";
        if (file_exists($file)) {
            require $file;
        }
    }

}

spl_autoload_register("Autoload::getFile");
