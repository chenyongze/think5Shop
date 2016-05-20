<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\index\controller;

use app\index\model\Members;
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
        $this->logicMembers = Loader::model('members', 'logic');
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
     * @return string
     */
    public function saveMember()
    {
        //输入过滤 todo
        $params = $_POST;
        unset($_POST);
        $result = $this->logicMembers->saveMember($params);

        if($result === true)
        {
            return ['success' => '注册成功', 'redirect' => 'url'];
        }
        return ['error' => $result];
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