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

class Menu extends Controller
{
    protected $menus;
    protected $logicAdmin;
    protected $adminInfo;

    public function __construct()
    {
        parent::__construct();
        $this->view->engine->layout(false);
        $this->menus = Loader::model('Menus', 'logic');
        $this->logicAdmin = Loader::model('Admin', 'logic');
        $this->adminInfo = $this->logicAdmin->getUserData();
    }

    /**
     * 后台菜单挂件
     * @param $params
     * @return mixed
     */
    public function index($params)
    {

        $active = 0;
		$result = $this->menus->getMenu($this->adminInfo);
        $this->assign('menus', $result);
        $this->assign('active',$active);
        return $this->fetch('widget/left-menu');
    }
}