<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/22
 * Time: 16:31
 */

namespace think\user;

use think\Loader;
use think\Model;
use think\Session;
use think\Db;

class Passport
{
    public $userType = 'members';

    /**
     * 检查登录
     */
    public function checkLogin()
    {
        $userData = $this->getUserData();
        $localType = Session::get('localType');
        if (!$userData) return false;
        $authSign = [
            'userId' => $userData['id'],
            'userName' => $userData[$localType],
            'localType' => $localType
        ];
        if (!Session::get('authSign') == $this->_dataAuthSign($authSign)) {
            return false;
        }
        return true;
    }


    public function loginType()
    {
        return $this->cache;
    }

    /**
     * 格式化用户数据
     * @param $data
     */
    public function formatData(&$data)
    {
        $localType = $this->getLocalType($data[$this->userType]['local']);
        $data[$this->userType][$localType] = $data[$this->userType]['local'];
        $data[$this->userType]['createtime'] = time();
        $data[$this->userType]['password'] = $this->encryption($data[$this->userType]);
        if ($localType != 'local') unset($data[$this->userType]['local']);
        unset($data[$this->userType]['repassword']);
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
        $param['localType'] = $this->getLocalType($local);
        $param['local'] = $local;
        if($this->getUserData($param)){
            return false;
        }
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
        $checkName['localType'] = $this->getLocalType($data[$this->userType]['local']);
        $checkName['local'] = $data[$this->userType]['local'];
        $localType = 're' . $checkName['localType'];
        $userData['local'] = $data[$this->userType]['local'];
        if (!$validate->scene($localType)->check($data[$this->userType])) {
            return $validate->getError();
        }
        //判断是否已被注册
        if($this->getUserData($checkName)){
            return $checkName['local'] . '已被使用';
        }
        $this->formatData($data);
        $uid = 0;
        Db::table('members')->insert($data[$this->userType]) && $uid = Db::getLastInsID();
        if (!$uid) {
            return '注册失败，请联系管理员';
        }
        $userData['userId'] = $uid;
        $userData['localType'] = $checkName['localType'];
        $this->setSession($userData);
        return true;
    }

    /**
     * 获取用户id
     * @return int
     */
    public function getUserId()
    {
        return Session::get('userId');
    }

    /**
     * 用户登录验证
     * @param $param
     * @return bool
     */
    public function loginPost($param)
    {
        $param['localType'] = $this->getLocalType($param['local']);
        $userData = $this->getUserData($param);
        foreach ($userData as $value) {
            if ($value['password'] == $this->encryption(['password' => $param['password'], 'createtime' => $value['createtime']])) {
                $data = [
                    'userId' => $value['id'],
                    'local' => $value[$param['localType']],
                    'localType' => $param['localType']
                ];
                $this->setSession($data);
                return true;
            }
        }
        return false;
    }

    /**
     * 密码加密
     * @param $param
     * @return string
     */
    protected function encryption($param)
    {
        if (!$param['password'] && !$param['createtime']) {
            return '';
        }
        return md5($param['password'] . $param['createtime']);
    }


    /**
     * 根据用户id或登录帐号获取用户数据
     * @param null $param
     * @return array
     */
    public function getUserData($param = null)
    {
        !isset($param['uId']) &&
        !isset($param['local']) &&
        $param['uId'] = $this->getUserId();
        $userData = Array();
        if (isset($param['uId']) && $param['uId']) {
            $userData = Db::table($this->userType)
                ->field(join(',', $this->getColumns()))
                ->where('id', $param['uId'])
                ->find();
        } elseif (isset($param['local']) && $param['local']) {
            //用户名查询 用于登录查询密码  判断重名
            $userData = Db::table($this->userType)
                ->field($param['localType'] . ', id, password, createtime')
                ->where($param['localType'], trim($param['local']))
                ->select();
        }
        return $userData;
    }

    /**
     * 获取查询字段
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            'members' => ['id', 'local', 'email', 'mobile'],
            'admin' => ['id', 'local'],
        ];
        return $columns[$this->userType];
    }

    /**
     * 设置session
     * @param $userData
     */
    public function setSession($userData)
    {
        Session::set('localType', $userData['localType']);
        Session::set('userId', $userData['userId']);
        Session::set('userName', $userData['local']);
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

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::set('localType', null);
        Session::set('userId', null);
        Session::set('userName', null);
        Session::set('authSign', null);
    }
}