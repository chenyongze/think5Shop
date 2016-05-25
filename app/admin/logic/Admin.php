<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/23
 * Time: 21:22
 */

namespace app\admin\logic;

use think\user\Passport;

class Admin extends Passport
{
    public $userType = 'admin';
}