<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:07
 */

namespace app\home\controller;

use think\Controller;

class Cart extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}