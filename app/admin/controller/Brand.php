<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:08
 */

namespace app\admin\controller;

use extend\verify\Admin;

class Brand extends Admin
{
    /**
     * 商品品牌
     */
    public function index()
    {
        $this->fetch();
    }

    /**
     * 品牌审核
     */
    public function checked()
    {

    }

    /**
     * 品牌详情
     */
    public function details()
    {

    }

    /**
     * 品牌冻结
     */
    public function freeze()
    {

    }

    /**
     * 品牌编辑
     */
    public function edit()
    {

    }

    /**
     * 品牌添加
     */
    public function add()
    {

    }

    /**
     * 品牌删除
     */
    public function del()
    {

    }

    public function _empty()
    {
        $this->index();
    }
}