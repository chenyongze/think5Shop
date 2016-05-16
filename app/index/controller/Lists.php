<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:07
 */

namespace app\index\controller;

use think\Controller;

class Lists extends Controller
{
    /**
     * 商品列表页
     */
    public function index()
    {
        return $this->fetch();
    }

    public function test()
    {
        return $this->fetch();
    }
}