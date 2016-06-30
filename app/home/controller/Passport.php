<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Loader;
use think\Session;

class Passport extends Controller
{
    public $userData;
    public $logicUser;

    public function __construct()
    {
        parent::__construct();
        //import('user.Object');
        $this->logicUser = Loader::model('User', 'logic');
        //$this->userObj = new \extend\user\Object();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        if ($this->logicUser->checkLogin()) {
            $this->redirect('index/index');
        }
        return $this->fetch('login');
    }

    /**
     * 检查登录状态
     */
    public function checkLogin()
    {
        if ($this->logicUser->checkLogin()) {
            $this->redirect('index/index');
        } else {
            $this->redirect('Passport/login');
        }
    }

    /**
     * 用户登录
     */
    public function loginPost()
    {
        if ($this->logicUser->loginPost($_POST['members'])) {
            return $this->success('登录成功', 'reset');
        } else {
            return $this->error('登录失败', '');
        }

    }

    /**
     * 用户注册
     */
    public function register()
    {
        if ($this->logicUser->checkLogin()) {
            $this->redirect('index/index');
        }
        return $this->fetch();
    }

    /**
     * 用户注册提交
     * @return string
     */
    public function saveMember()
    {
        //输入过滤 todo
        $params = $_POST;
        //unset($_POST);
        $result = $this->logicUser->saveMember($params);
        //\think\Response::type('json');
        if ($result === true) {
            return $this->success('新增成功', 'reset');
        }
        return $this->error('注册失败', '', $result);
    }

    /**
     * 用户重置密码
     */
    public function reset()
    {
        var_dump(Session::get('userId'));
        var_dump(Session::get('localType'));
        var_dump(Session::get('userName'));
        var_dump(Session::get('authSign'));
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
        \think\Response::type('json');
        if (!$_POST['value']) return $this->error('非法请求');
        if (!$this->logicUser->checkLocal($_POST['value'])) {
            return $this->error('重名');
        }
        return $this->success('可用');
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

    /**
     * 注销
     */
    public function logout()
    {
        $this->logicUser->logout();
        return $this->success('退出成功');
    }

    /**
     * 重置密码
     */
    public function rePassword()
    {

    }
}