<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/21
 * Time: 13:42
 */
class Mymodel extends PDO
{
    private $data_conf = array();   //用来储存数据库配置

    public function __construct()
    {
        $this->data_conf = conf::get('database');
        $dsn = 'mysql:host='.$this->data_conf['HOST'].';dbname='.$this->data_conf['DBNAME'].'';
        try {
            parent::__construct($dsn,$this->data_conf['UNAME'],$this->data_conf['UPASS']);
        } catch (Exception $e) {
            p($e->getMessage());
        }
    }
}