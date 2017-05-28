<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/5/20
 * Time: 23:44
 */
class Admin extends MYcontroller
{
    protected $_TestUserModel;

    public function __construct()
    {
        $this->_TestUserModel = new TestUserModel();
    }

    public function index()
    {
        $data['title'] = 'this is admin';
        $data['content']  = '这里是视图';
        $this->display('admin/index',$data);
    }

    /**
     * 测试查询方法
     */
    public function selectAction()
    {
        $selects = $this->_TestUserModel->_select('*');
        p($selects);
    }

    /**
     * 测试插入
     */
    public function insertAction()
    {
    	$data = [
				'user_name' => 'test',
				'pass_word' => 'test',
				'address' => '北京'
			];
//		$datas = [
//			[
//				'user_name' => 'test',
//				'pass_word' => 'test',
//				'address' => '北京'
//			],
//			[
//				'user_name' => 'test1',
//				'pass_word' => 'test1',
//				'address' => '上海'
//			]
//		];
		$result = $this->_TestUserModel->_insert($data);
		p($result);
    }

	/**
	 * 测试更新
	 */
    public function updateAction()
	{
		$data = [
			'user_name' => 'test2',
			'pass_word' => 'test3',
			'address' => '北京2'
		];
		$where = [
			'user_name' => 'test'
		];
		$result = $this->_TestUserModel->_update($data,$where);
		p($result);
	}

	/**
	 * 测试删除
	 */
	public function deleteAction()
	{
		$where = [
			'user_name' => 'test'
		];
		$result = $this->_TestUserModel->_update($where);
		p($result);
	}
}