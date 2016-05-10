<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/10
 * Time: 23:28
 * Descriptions 商家管理
 */

namespace app\admin\controller;

use think\verify\Desktop;

class seller extends Desktop
{
    /**
     * 商家列表
     */
    public function index()
    {

    }

    /**
     * 商家详情
     */
    public function details()
    {

    }

    /**
     * 商家冻结
     */
    public function freeze()
    {

    }

    /**
     * 商家编辑
     */
    public function edit()
    {

    }

    /**
     * 商家审核
     */
    public function checked()
    {

    }

    /**
     * 商家添加
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