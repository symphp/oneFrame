<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/18
 * Time: 22:11
 * 框架入口文件
 * 1.定义路径常量
 * 2.加载函数库
 * 3.启动框架
 */

define('ROOT',dirname(__FILE__));   //定义框架所在路径
define('CORE',ROOT.'/Core');     //定义核心文件路径
define('APP',ROOT.'/App');   //定义项目文件路径
define('CONFIG',ROOT.'/Config'); //配置文件
define('DRIVE',ROOT.'/Core/Drive'); //驱动路径

define('DEBUG',true);   //是否开启调试模式
if(DEBUG) {
    ini_set('display_errors','On');
} else {
    ini_set('display_errors','Off');
}

require CORE.'/Function.php';   //加载函数
require CORE.'/Oneframe.php';   //加载框架核心

spl_autoload_register(array('Core\Oneframe','load'));

Core\Oneframe::run();