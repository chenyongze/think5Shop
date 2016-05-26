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
use think\Loader;


class Passport extends Controller
{
    protected $logicAdmin;

    public function __construct()
    {
        parent::__construct();
        $this->logicAdmin = Loader::model('Admin', 'logic');
    }

    public function index()
    {
        if ($this->logicAdmin->checkLogin()) {
            $this->redirect('index/index');
        }
        return $this->fetch();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        if($this->logicAdmin->loginPost($_POST['admin'])){
            return $this->success('登录成功','index/index', true);
        }else{
            return $this->error('登录失败');
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        $this->logicAdmin->logout();
        return $this->success('退出成功');
    }
}