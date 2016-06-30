<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/20
 * Time: 11:25
 * Descriptions 前台菜单挂件
 */

namespace app\home\widget;

use \think\Controller;

class Menu extends Controller
{
    public function index($param)
    {
        return $this->fetch('widget/left-menu');
    }


    public function pageType($param)
    {

    }

    public function getData()
    {

    }
}