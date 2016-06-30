<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/10
 * Time: 16:09\
 * Descriptions 后台统一验证
 */

namespace library\verify;

use think\Controller;
use think\Loader;

class Desktop extends Controller
{
    protected $logicAdmin;
    protected $adminInfo;
    public function __construct()
    {
        $this->logicAdmin = Loader::model('Admin', 'logic');
        if (!$this->logicAdmin->checkLogin()) {
            $this->redirect('Passport/index');
            die;
        }
        parent::__construct();
        $this->adminInfo = $this->logicAdmin->getUserData();
        if(!X_PJAX){
            $this->view->engine->layout('layout/desktop/index');
        }

    }
}