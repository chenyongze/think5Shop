<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/24
 * Time: 21:10
 */

namespace app\admin\widget;

use think\Controller;
use think\Loader;
use think\verify\Desktop;

class Menu extends Desktop
{
    protected $menus;
    protected $adminInfo;

    public function __construct()
    {
        parent::__construct();
        $this->menus = Loader::model('Menus', 'logic');
        $this->adminInfo = $this->logicAdmin->getUserData();
    }

    public function menuTab()
    {
        $this->assign('tab', $this->menus->getMenuTab($this->adminInfo));
        return $this->fetch('widget/menu-tab');
    }

    /**
     * 后台菜单挂件
     * @param $params
     * @return mixed
     */
    public function index($params)
    {
        $active = 0;
        $this->assign('menus', $this->menus->getMenu($this->adminInfo, $active));
        $this->assign('active',$active);
        return $this->fetch('widget/left-menu');
    }
}