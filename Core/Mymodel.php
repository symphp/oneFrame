<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/21
 * Time: 13:42
 */
class Mymodel extends Medoo\Medoo
{
    /**
     * 初始化Medoo
     * Mymodel constructor.
     */
    public function __construct()
    {
        parent::__construct(conf::get('database'));
    }
}