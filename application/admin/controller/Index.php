<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Index extends controller
{
    public function index()
    {
       return $this->fetch();
    }

    public function testTmp()
    {
        $this->view->engine->layout('layout');
        return $this->fetch();
    }

}
