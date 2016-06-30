<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Loader;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index', ['aaa' => '222']);

    }

}
  