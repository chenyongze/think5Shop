<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\home\controller;

use think\Controller;
class Member extends Controller
{
    /**
     * 会员中心首页
     */
    public function index()
    {
        return $this->fetch();
    }
}