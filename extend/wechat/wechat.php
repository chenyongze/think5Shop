<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/6
 * Time: 15:58
 * Descriptions 微信接口配置
 */

namespace extend\wechat;

define('APPID', 'wxa4402973fd06422d');
define('APPRERCET', 'd4624c36b6795d1d99dcf0547af5443d');
define("TOKEN", "weixin");
use \think\config;
class wechat
{
    protected $accessToken;
    protected $curlObj;
    private $_wechatSetting = [];

    public function __construct()
    {
        if($this->checkSignature())
        {
            import('vendor.api.curl');
            Config::load('WechatSetting.php');
            $this->curlObj = new \vendor\api\curl();
        }
    }

    public function getMenu()
    {
        $this->curlObj->init(Config::get('requestUrl.menu'));
        $this->accessToken = $this->getAccessToken();
        $this->curlObj->request(Config::get('menu'));
    }

    public function getAccessToken()
    {
        $requestData = ['grant_type' => 'client_credential', 'appid' => APPID, 'secret' => APPRERCET];
        $data = $this->curlObj->request($requestData);//通过自定义函数getCurl得到https的内容
        $resultArr = json_decode($data, true);//转为数组
        return $resultArr["access_token"];//获取access_token
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}