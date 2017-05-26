<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/20
 * Time: 23:44
 */
class Admin extends MYcontroller
{
    public function index()
    {
        $data['title'] = 'this is admin';
        $data['content']  = '这里是视图';
        $this->display('admin/index',$data);
    }

}