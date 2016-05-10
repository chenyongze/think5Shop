<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/10
 * Time: 16:09\
 * Descriptions 后台统一验证
 */

namespace think\verify;

use think\Controller;

class Desktop extends Controller
{
    public function __construct()
    {
        if (!$jg = $this->_verify()) {
            $this->redirect('Login/index');
        }
        parent::__construct();
        $this->view->engine->layout('layout/desktop/index');
    }

    private function _verify()
    {
        return true;
    }
}