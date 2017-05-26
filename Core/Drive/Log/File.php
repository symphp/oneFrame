<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/24
 * Time: 22:35
 * 文件驱动
 */
class File
{

    public  $drives = array();   //log驱动配置

    public function __construct($_drives)
    {
        $this->drives = $_drives;
    }

    /**
     * 添加日志
     * @param $message string 日志信息
     * @param $file string 文件名
     * @return true;
     */
    public function add_log($message,$file = '')
    {
        $file_name = $file.'.php';
        $file_path = $this->drives['OPTION']['PATH'];  //日志保存的位置

        if(!is_dir($file_path) && !is_writable($file_path)) {
            mkdir($file_path,'0777',true);   //目录不存在,或不可写时创建目录
        }

        $message .= "\t".date('Y-m-d H:i:s').PHP_EOL;    //msg加上空格时间换行
        return  file_put_contents($file_path.$file_name,$message,FILE_APPEND);
    }

}