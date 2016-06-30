<?php
namespace app\home\controller;

class Wechat
{
    public $wechat;

    public function index()
    {
        import('api.wechat');
        $this->wechat = new \extend\api\wechat();
    }
}
