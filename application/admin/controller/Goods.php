<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:05
 */

namespace app\admin\controller;

use think\verify\Desktop;
class Goods extends Desktop
{
    /**
     * 商品列表
     */
    public function index()
    {

    }

    /**
     * 商品详情
     */
    public function details()
    {

    }

    /**
     * 商品冻结
     */
    public function freeze()
    {

    }

    /**
     * 商品上下架
     */
    public function marketable()
    {

    }

    /**
     * 商品编辑
     */
    public function edit()
    {

    }

    /**
     * 商品添加
     */
    public function add()
    {

    }

    /**
     * 商品删除
     */
    public function del()
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