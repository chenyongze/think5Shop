<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/10
 * Time: 23:13
 */

namespace app\admin\controller;

use extend\verify\Admin;

class Manage extends Admin
{

    /**
     * 管理员列表
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 管理员日志
     */
    public function logs()
    {
        return $this->fetch();
    }

    /**
     * 修改权限
     */
    public function permission()
    {

    }

    /**
     * 添加管理员
     */
    public function addManage()
    {

    }

    /**
     * 删除管理员
     */
    public function delManage()
    {

    }

    /**
     * 修改管理员密码
     */
    public function editPwd()
    {

    }
}