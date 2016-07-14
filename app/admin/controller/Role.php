<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 21:12
 */

namespace app\admin\controller;

use extend\verify\Admin;

class Role extends Admin
{
    /**
     * 管理员管理
     */
    public function index()
    {
        return $this->fetch();
    }
}