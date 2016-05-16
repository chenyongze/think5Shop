<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 21:39
 */

namespace extend\user;

class Object
{
    /**
     * 获取用户数据
     * @return array
     */
    public function getInfo()
    {
       return [];
    }

    /**
     * 获取session
     * @return int
     */
    public function getSession()
    {
        return 0;
    }

    /**
     * 设置session
     * @return int
     */
    public function setSession()
    {
        return 0;
    }


    /**
     * 退出登录
     * @return bool
     */
    public function logOut()
    {
        return true;
    }
}