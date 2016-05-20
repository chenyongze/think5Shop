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
use think\Loader;

class Passport extends Controller
{
    public $userObj;
    public $logicMembers;

    public function __construct()
    {
        parent::__construct();
        import('user.Object');
        $this->logicMembers = Loader::model('Members', 'logic');
        $this->userObj = new \extend\user\Object();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        if ($this->logicMembers->checkLogin()) {
            $this->redirect('index/index');
        }
        return $this->fetch('login');
    }

    /**
     * 检查登录状态
     */
    public function checkLogin()
    {
        if ($this->logicMembers->checkLogin()) {
            $this->redirect('index/index');
        } else {
            $this->redirect('Passport/login');
        }
    }

    /**
     * 用户注册
     */
    public function register()
    {
        if ($this->logicMembers->checkLogin()) {
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
        unset($_POST);
        $result = $this->logicMembers->saveMember($params);
        \think\Response::type('json');
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