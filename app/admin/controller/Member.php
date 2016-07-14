<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\admin\controller;

use extend\verify\Admin;

class Member extends Admin
{

    /**
     * 会员列表
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 会员详情
     */
    public function details()
    {

    }

    /**
     * 会员冻结
     */
    public function freeze()
    {

    }

    /**
     * 会员编辑
     */
    public function edit()
    {

    }

    /**
     * 会员添加
     */
    public function add()
    {

    }

    /**
     * 未找到action
     */
    public function _empty()
    {
        //todo
        $this->index();
    }
}