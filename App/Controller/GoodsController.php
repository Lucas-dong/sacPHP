<?php

class GoodsController extends Controller {
	public function index(){
		echo 'hello world';
	}

	public function buy(){
		echo 'go buy';
	}

	public function test(){
		$this->assign('title','今天');
		$this->assign('content','哈哈');

		$user = new UserModel();

		// print_r($user->find(2));
		// print_r($user);	
		// $user->name = 'ss';
		// $user->add();

		// echo $user->age;

		$user->uanme = 'xxx';
		$user->age = 99;
		print_r($user->add());

		$this->display('goods');
	}
}


