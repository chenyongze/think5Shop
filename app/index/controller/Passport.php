<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\index\controller;

use think\Controller;
use think\Db;

class Passport extends Controller
{
    public $userObj;
    public $logicPassport;

    public function __construct()
    {
        parent::__construct();
        import('Passport', 'logic');
        import('user.Object');
        $this->logicPassport = new \app\index\logic\Passport();
        $this->userObj = new \extend\user\Object();

    }

    /**
     * 用户登录
     */
    public function login()
    {
        $jg = Db::table('members')->select();
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
     * 用户注册提交
     */
    public function saveMember()
    {
        //输入过滤 todo
        $params = $_POST;
        unset($_POST);
        $msg = $this->logicPassport->checkData($params);
        if($msg)
        {
            return ['error' => $msg];
        }
        if($this->logicPassport->saveMember($params))
        {
            return ['success' => '注册成功', 'redirect' => 'url'];
        }
        return ['error' => '注册失败'];
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
        return ['error' => '失败', 'redirect' => 'url'];
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