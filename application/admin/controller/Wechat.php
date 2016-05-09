<?php
namespace app\admin\controller;

class Wechat
{
    public $wechat;

    public function index()
    {
        import('vendor.api.wechat');
        $this->wechat = new \vendor\api\wechat();
    }
}
