<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/19
 * Time: 17:59
 */

namespace app\admin\validate;

use \think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'local'      => 'require|length:6,20',
        'password'   => 'require|length:6,20',
    ];//验证规则
    protected $message = [
        'local.require'    => '用户名必填',
        'local.length'     => '用户名长度不符合要求',
        'password.require' => '密码必填',
        'password.length'  => '密码长度不符合要求',
    ];//错误信息
    protected $scene = [
        'local'     => ['local', 'password'],
    ];//选择性验证
}