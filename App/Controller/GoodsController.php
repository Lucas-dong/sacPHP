<?php
require X_PATH . '/Base/Model.php';
// use Model;

class GoodsController extends Controller
{
    public function index()
    {
        echo 'hello world';
    }

    public function buy()
    {
        echo 'go buy';
    }

    public function test()
    {
        // $this->assign('title','今天');
        // $this->assign('content','哈哈');

        $user = new UserModel();
        // print_r($user);
        // Db::table('user');
        // $data = $user->fields('age,uanme')->select();
        // print_r($data);
        $data = $user->fields('age,uanme')->find(2);
        print_r($data);
        // echo json_encode($data);
        // print_r( $data );

        // $user->name = 'ss';
        // $user->add();

        // echo $user->age;

        $this->assign('title', $data['uanme']);
        $this->assign('content', $data['age']);

        $user->uanme = 'xxx';
        $user->age   = 99;
        // print_r($user->add());

        $this->display('goods');
    }
}
