<?php
namespace app\admin\Controller;

use think\verify\Desktop;
use think\Db;


class Index extends Desktop
{
    public function index()
    {
       return $this->fetch();
    }

    public function testTmp()
    {
        return $this->fetch();
    }

}
