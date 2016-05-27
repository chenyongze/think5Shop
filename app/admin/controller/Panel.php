<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25
 * Time: 9:17
 */

namespace app\admin\controller;

use think\Response;
use think\verify\Desktop;
use think\Loader;

class Panel extends Desktop
{
    protected $logicMenu;
    public function __construct()
    {
        parent::__construct();
        $this->logicMenu = Loader::model('Menus', 'logic');
    }

    //控制面板页面
    public function index()
    {
        return $this->fetch();
    }

    //权限管理
    public function permission()
    {

    }

    //菜单管理
    public function menu()
    {
        $this->assign('menus', $this->logicMenu->getOneLevel());
        return $this->fetch();
    }

    /**
     * ajax查询子菜单
     * @param $menu
     * @return mixed
     */
    public function getChildren($menu)
    {
        Response::type('json');
        if (!is_numeric($menu) || $menu <= 0) return '';
        $this->assign('menus', $this->logicMenu->getChildren($menu, true));
        return $this->fetch();
    }

    public function addGroup()
    {
        var_dump($_POST);
        return $this->fetch('Panel/modal/get-children');
    }
}