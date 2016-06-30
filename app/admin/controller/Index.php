<?php
namespace app\admin\Controller;

use library\verify\Desktop;
use think\Db;


class Index extends Desktop
{
    public function index()
    {
       return $this->fetch();
    }
}
