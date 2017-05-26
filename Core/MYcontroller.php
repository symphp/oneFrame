<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/21
 * Time: 15:20
 */
class MYcontroller
{
    private $data = array();

    /**
     * 渲染视图
     * @param $view string 视图文件
     * @param array $data 数据
     */
    public function display($view,$data = array())
    {
        foreach ($data as $key=>$value) {
            $this->data[$key] = $value;
        }

        $view_file = APP.'/Views/'.$view.'.php';

        if(is_file($view_file)) {
            extract($this->data);   //数组的键作为变量名称
            include $view_file;
        }
    }
}