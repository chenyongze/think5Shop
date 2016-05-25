<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/19
 * Time: 17:59
 */

namespace app\index\validate;

use \think\Validate;

class Members extends Validate
{
    protected $rule = [
        'local'      => 'require|length:6,20',
        'email'      => 'require|email',
        'mobile'     => 'require|regex:/^1[34578]{1}[0-9]{9}$/',
        'password'   => 'require|length:6,20',
        'repassword' => 'require|confirm:password',
        'accept'     => 'accepted',
    ];//验证规则
    protected $message = [
        'local.require'      => '用户名必填',
        'local.length'       => '用户名长度不符合要求',
        'email.require'      => '用户名必填',
        'email.email'        => '邮箱格式不正确',
        'mobile.require'     => '用户名必填',
        'mobile.email'       => '邮箱格式不正确',
        'password.require'   => '密码必填',
        'password.length'    => '密码长度不符合要求',
        'repassword.require' => '确认密码必填',
        'repassword.confirm' => '确认密码不正确',
    ];//错误信息
    protected $scene = [
        'relocal'   => ['local', 'password', 'repassword'],
        'reemail'   => ['email', 'password', 'repassword'],
        'remobile'  => ['mobile', 'password', 'repassword'],
        'local'     => ['local', 'password'],
        'email'     => ['email', 'password'],
        'mobile'    => ['mobile', 'password'],
    ];//选择性验证
}