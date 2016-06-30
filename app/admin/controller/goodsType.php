<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 21:04
 */

namespace app\admin\controller;

use library\verify\Desktop;

class goodsType extends Desktop
{
    /**
     * 商品类型
     */
    public function manage()
    {
        $this->fetch();
    }
}