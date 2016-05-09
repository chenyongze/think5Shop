<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        print_r(\think\Loader::model('Passport', 'logic')->test());
       //return $this->fetch();
    }

    public function testTmp()
    {
        $this->view->engine->layout('layout');
        return $this->fetch();
    }

}
