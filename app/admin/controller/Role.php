<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 21:12
 */

namespace app\admin\controller;

use library\verify\Desktop;

class Role extends Desktop
{
    /**
     * 管理员管理
     */
    public function index()
    {
        return $this->fetch();
    }
}