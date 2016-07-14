<?php

namespace app\admin\Controller;

use extend\verify\Admin;
use think\Db;


class Index extends Admin
{
    public function index()
    {
       return $this->fetch();
    }
}
