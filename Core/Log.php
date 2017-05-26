<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/24
 * Time: 22:33
 * 日志
 */
class Log
{
    public static $_drives = array();   //log驱动配置

    public static $class;   //驱动对象

    /**
     * 初始化log驱动方法
     * 判断驱动对象是否存在 获取驱动文件配置 实例化
     * @return mixed
     */
    static public function init()
    {
        if(self::$class) {
            return self::$class;
        }
        self::$_drives = Conf::get('Log');
        $drive_file = DRIVE.'/Log/'.self::$_drives['DRIVE'].'.php';    //驱动文件路径
        if(file_exists($drive_file)) {
            include $drive_file;
            self::$class = new self::$_drives['DRIVE'](self::$_drives);
        } else {
           echo new Exception(self::$_drives['DRIVE'].'驱动不存在');
        }
    }

    /**
     * 添加日志
     * @param $message string 日志信息
     * @param $file string 文件名
     */
    static public function add_log($message,$file = 'log')
    {
        self::$class->add_log($message,$file);
    }
}