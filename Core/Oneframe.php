<?php
namespace Core;
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/18
 * Time: 22:37
 * 核心加载类
 */
class Oneframe
{
    private static $controller = 'Admin';    //控制器
    private static $aciton = 'index';    //方法
    private static $param = array(); //get参数

    static public function run()
    {
        self::route();
        $ctrl_url = APP.'/Controllers/'.self::$controller.'.php';    //控制器路径
        if(is_file($ctrl_url)) {
            $ctrl = new self::$controller;  //实例化控制器
            $action = self::$aciton;    //方法
            if(method_exists($ctrl,$action)) {
                $ctrl->$action(self::$param);   //执行控制器方法
                \Log::init();   //初始化log驱动
                \Log::add_log('ctrl:'.self::$controller.'  '.'action:'.$action);    //记录路由log
            } else {
                throw new \Exception($action.'方法不存在');
            }
        } else {
            throw  new \Exception(self::$controller.'控制器不存在');
        }
    }

    /**
     * 解析路由
     * 1.隐藏index.php
     * 2.获取url 参数部分
     * 3.返回对应功控制器和方法与参数
     */
    private static function route()
    {
        $path = $_SERVER['REQUEST_URI'];
        if (isset($path) && $path != '/') {
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])) {
                self::$controller = $patharr[0];
                unset($patharr[0]);
            }
            if (isset($patharr[1])) {
                self::$aciton = $patharr[1];
                unset($patharr[1]);
            } else {
                self::$aciton = 'index';
            }
            //解析param参数
            $parmaarr = array_values($patharr);
            $parma_count = count($parmaarr)%2 == 1?count($parmaarr)-1:count($parmaarr);
            for ($i = 0; $i < $parma_count; $i += 2) {
                self::$param[$parmaarr[$i]] = $parmaarr[$i + 1];
            }
        }
    }


    /**
     * 自动加载类
     */
    public static function load($class)
    {
        $controller = APP.'/Controllers/'.$class.'.php';
        //模型类文件目录
        $model = 'app/models/'.$class.'.php';
        //核心类文件目录
        $core = 'core/'.$class.'.php';
        if(file_exists($controller)) {
            include_once $controller;
        } else if(file_exists($model)) {
            include_once $model;
        } else if(file_exists($core)) {
            include $core;
        } else {
            throw new \Exception('自动加载失败');
        }
    }
}