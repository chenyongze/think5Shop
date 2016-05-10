<?php
namespace app\admin\Controller;

use think\verify\Desktop;
use think\Db;

class Index extends Desktop
{
    public function __construct()
    {
        parent::__construct();
        $this->view->engine->layout('layout/desktop/index');
    }

    public function index()
    {
       return $this->fetch();
    }

    public function testTmp()
    {
        //$this->view->engine->layout('layout');
        return $this->fetch();
    }

}
