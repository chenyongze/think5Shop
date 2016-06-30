<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 20:57
 */

namespace app\admin\controller;

use library\verify\Desktop;

class Category extends Desktop
{
    /**
     * 商品分类
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}