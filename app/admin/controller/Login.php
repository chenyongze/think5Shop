<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/10
 * Time: 16:26
 * Descriptions 后台登录
 */

namespace app\admin\Controller;

use think\Controller;
use think\verify\Desktop;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 退出登录
     */
    public function logOut()
    {

    }
}