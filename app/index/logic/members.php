<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\index\logic;

use think\Loader;
use think\Model;
use think\Session;
use think\Db;

class Members extends Model
{

    public $userType = 'members';

    /**
     * 检查登录
     */
    public function checkLogin()
    {
        $userData = $this->getUserData();
        $authSign = [
            $this->userType . 'Id' => $userData['member_id'],
            'local' => $userData['name']
        ];
        if (!Session::get('authSign') == $this->_dataAuthSign($authSign)) {
            return false;
        }
        return true;
    }

    /**
     * 格式化用户数据
     * @param $data
     */
    public function formatData(&$data)
    {
        $localType = $this->getLocalType($data[$this->userType]['local']);
        $data[$this->userType][$localType] = $data[$this->userType]['local'];
        if ($localType != 'local') unset($data[$this->userType]['local']);
        unset($data[$this->userType]['repassport']);
    }

    /**
     * 获取登录帐号类型
     * @param $loginName
     * @return string
     */
    public function getLocalType($loginName)
    {
        $localType = 'local';
        if ($loginName && strpos($loginName, '@')) {
            $localType = 'email';
        } elseif (preg_match("/^1[34578]{1}[0-9]{9}$/", $loginName)) {
            $localType = 'mobile';
        }
        return $localType;
    }

    /**
     * 判断重名
     * @param $local
     * @return bool
     */
    public function checkLocal($local)
    {
        $localType = $this->getLocalType($local);
        return true;
    }

    /**
     * 保存用户数据
     * @param $data
     * @return bool
     */
    public function saveMember(&$data)
    {
        $validate = Loader::validate('Members');
        $localType = 're' . $this->getLocalType($data[$this->userType]['local']);
        $userData['local'] = $data[$this->userType]['local'];
        if (!$validate->scene($localType)->check($data[$this->userType])) {
            return $validate->getError();
        }
        $this->formatData($data);
        $uid = Loader::model('Members')->save($data[$this->userType]);
        if (!$uid) {
            return '注册失败，请联系管理员';
        }
        $userData['userId'] = $uid;
        $this->setSession($userData);
        return true;
    }

    /**
     * 获取用户id
     * @return int
     */
    public function getUserId()
    {
        return Session::get($this->userType . 'Id');
    }

    /**
     * 获取用户数据
     * @return int
     */
    public function getUserData($uid = null)
    {
        !is_numeric($uid) && $uid = $this->getUserId();
        if (!$uid) return [];
        $userData = Db::table('Members')->field('member_id, name')->where('member_id', 1)->find();
        return $userData;
    }

    /**
     * 设置session
     * @param $userData
     */
    public function setSession($userData)
    {
        Session::set($this->userType . 'Id', $userData['userId']);
        Session::set($this->userType . 'Name', $userData['local']);
        Session::set('authSign', $this->_dataAuthSign($userData));
    }

    /**
     * 加密生成签名证
     * @param $data
     * $return string
     */
    private function _dataAuthSign(Array $data)
    {
        ksort($data);
        return sha1(http_build_query($data));
    }

    /**
     * 设置cookie
     * @param $userData
     */
    public function setCookie($userData)
    {

    }


}