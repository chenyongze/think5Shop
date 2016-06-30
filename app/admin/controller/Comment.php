<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/6/26
 * Time: 21:00
 */

namespace app\admin\controller;

use library\verify\Desktop;

class Comment extends Desktop
{
    /**
     * 用户评论
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}