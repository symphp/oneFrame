<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/22
 * Time: 22:19
 */

class conf
{
    static public $conf = array();

    /**
     * 获取配置项
     * @param string $file 文件名
     * @throws Exception
     * @return array $conf[文件] 返回配置文件
     */
    static public function get($file = 'Database')
    {
        if(isset(self::$conf[$file])) { //判断配置是否存在，存在则返回
            return self::$conf[$file];
        }
        $path = CONFIG.'/'.$file.'.php';    //配置文件路径
        if(is_file($path)) {    //判断是否存在
            $conf = include $path;  //保存配置
            self::$conf[$file] = $conf;
            return self::$conf[$file];
        } else {
            throw new Exception('找不到配置文件'.$file);
        }
    }
}