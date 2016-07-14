<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Loader;

class Index extends Controller
{
    public function index()
    {
        $test = [
            'aaa' => 'bbb',
            'ccc' => 'ddd'
        ];
        $this->assign('rows', $test);
        $this->assign('label', '测试');
        $this->assign('value', 'value111');
        return $this->fetch('index', ['aaa' => '222']);
    }


    public function test()
    {
        return $this->fetch();
    }

}
  