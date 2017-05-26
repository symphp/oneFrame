<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/18
 * Time: 22:25
 */

function p($var)
{
    if(is_bool($var)) {
        var_dump($var);
    } else if(is_null($var)) {
        var_dump($var);
    } else {
        echo "<pre style='position: relative;font-size: 20px;
               '>".print_r($var,true)."</pre>";
    }
}