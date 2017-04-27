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
        $class = explode('\\',$class);
        $file = (__DIR__) . DIRECTORY_SEPARATOR . $class[0] . DIRECTORY_SEPARATOR . $class[1] . ".php";
        if (file_exists($file)) {
            require $file;
        }
    }

}

spl_autoload_register("Autoload::getFile");
