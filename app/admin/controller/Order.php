<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:08
 */

namespace app\admin\controller;

use think\verify\Desktop;

class Order extends Desktop
{
    /**
     * 订单列表
     */
    public function index()
    {

    }

    /**
     * 订单详情
     */
    public function details()
    {

    }

    /**
     * 订单冻结
     */
    public function freeze()
    {

    }

    /**
     * 订单发货
     */
    public function send()
    {

    }

    /**
     * 订单编辑
     */
    public function edit()
    {

    }

    /**
     * 商品完成
     */
    public function complete()
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