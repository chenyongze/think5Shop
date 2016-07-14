<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 21:04
 */

namespace app\admin\controller;

use extend\verify\Admin;

class goodsType extends Admin
{
    /**
     * 商品类型
     */
    public function manage()
    {
        $this->fetch();
    }
}