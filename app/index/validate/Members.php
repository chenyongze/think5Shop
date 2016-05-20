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
        'local'      => 'require|between:6,20',
        'email'      => 'require|email|between:6,20',
        'mobile'     => 'require|regex:/^1[34578]{1}[0-9]{9}$/',
        'passport'   => 'require|between:6,20',
        'repassport' => 'require|confirm:passport',
        'accept'     => 'accepted',
    ];//验证规则
    protected $message = [
        'name.require' => '必填',
        'name.max'     => '超过上限',
    ];//错误信息
    protected $scene = [
        'relocal'   => ['local', 'passport', 'repassport'],
        'reemail'   => ['email', 'passport', 'repassport'],
        'remobile'  => ['mobile', 'passport', 'repassport'],
        'local'     => ['local', 'passport'],
        'email'     => ['email', 'passport'],
        'mobile'    => ['mobile', 'passport'],
    ];//选择性验证
}