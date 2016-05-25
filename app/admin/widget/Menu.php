<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/24
 * Time: 21:10
 */

namespace app\admin\widget;

use think\Controller;

class Menu extends Controller
{
    /**
     * 后台菜单挂件
     * @param $params
     * @return mixed
     */
    public function index($params)
    {
        return $this->fetch('widget/left-menu');
    }
}