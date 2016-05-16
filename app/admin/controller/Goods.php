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
//        $content = '<{widget action="public/index" params="aaa" ccc=ddd}>
//        <{include action="public/index"}>
//        <{include action="public/index" params="bbb"}>';
//        $tmp = preg_split('!\<\{(\s*(?:\/|)[a-z][a-z\_0-9]*|)(.*?)\}\>!isu',$content,-1,PREG_SPLIT_DELIM_CAPTURE);
//        preg_match_all('/([a-z0-9\_\-]+)=(\'|"|)(.*?(?:[^\\\\]|))\2\s/isu',$tmp[2].' ',$matches,PREG_SET_ORDER);
//        print_r($tmp);
//        print_r($matches);
//        var_dump(2 % 3);
        return $this->fetch();
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