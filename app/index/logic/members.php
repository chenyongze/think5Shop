<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\index\logic;

use think\Loader;
use \think\Model;

class Members extends Model
{

    public $userType = 'members';

    /**
     * 检查登录
     */
    public function checkLogin()
    {
        return true;
    }

    /**
     * 检查用户数据
     * @param $data
     * @return string
     */
    public function checkData(&$data)
    {
        $localType = $this->getLocalType($data[$this->userType]['local']);
        foreach ($data[$this->userType] as &$value) {
            $value = trim($value);
        }

        if ($data[$this->userType]['local'] > 20) {
            return '用户名过长';
        }

        if ($data[$this->userType]['local'] < 5) {
            return '登录账号最少6个字符';
        }

        if (preg_match('/^[^\x00-\x2d^\x2f^\x3a-\x3f]+$/i', trim($data[$this->userType]['local']))) {
            return '该登录账号包含非法字符';
        }

        if ($localType == 'email' &&
            !preg_match('/^(?:[a-z\d]+[_\-\+\.]?)*[a-z\d]+@(?:([a-z\d]+\-?)*[a-z\d]+\.)+([a-z]{2,})+$/i', $data[$this->userType]['local'])
        ) {
            return '邮件格式不正确';
        }

        if ($data[$this->userType]['passport1'] != $data[$this->userType]['passport2']) {
            return '确认密码输入不正确';
        }
    }

    /**
     * 格式化用户数据
     * @param $data
     */
    public function formatData(&$data)
    {
        $localType = $this->getLocalType($data[$this->userType]['local']);
        $data[$this->userType][$localType] = $data[$this->userType]['local'];
        if($localType != 'local') unset($data[$this->userType]['local']);
        unset($data[$this->userType]['passport1']);
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
        if(!$validate->scene($localType)->check($data[$this->userType]))
        {
            return $validate->getError();
        }
        $this->formatData($data);
        $uid = Loader::model('Members')->save($data[$this->userType]);
        if(!$uid)
        {
            return '注册失败，请联系管理员';
        }
        return true;
    }

    /**
     * 获取注册ip
     * @return mixed
     */
    public function getRemoteAddr()
    {
        if (!isset($GLOBALS['_REMOTE_ADDR_'])) {
            $addrs = array();
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                foreach (array_reverse(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])) as $x_f) {
                    $x_f = trim($x_f);
                    if (preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/', $x_f)) {
                        $addrs[] = $x_f;
                    }
                }
            }
            $GLOBALS['_REMOTE_ADDR_'] = isset($addrs[0]) ? $addrs[0] : $_SERVER['REMOTE_ADDR'];
        }
        return $GLOBALS['_REMOTE_ADDR_'];
    }
}