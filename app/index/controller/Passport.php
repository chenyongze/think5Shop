<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\index\controller;

use think\Controller;

class Passport extends Controller
{
    public $userObj;
    public $userPassport;

    public function __construct()
    {
        parent::__construct();
        import('user.Passport');
        $this->userPassport = new \extend\user\Passport();
    }

    /**
     * 用户登录
     */
    public function login()
    {

        return $this->fetch('login');
    }

    /**
     * 用户注册
     */
    public function register()
    {
        return $this->fetch();
    }

    /**
     * 用户重置密码
     */
    public function reset()
    {

    }

    /**
     * 获取验证码
     */
    public function verifyCode()
    {

    }

    /**
     * 判断重名
     */
    public function checkName()
    {

    }

    /**
     * 绑定手机
     */
    public function bindPhone()
    {

    }

    /**
     * 绑定邮箱
     */
    public function bindEmail()
    {

    }
}