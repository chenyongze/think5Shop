<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\home\logic;

use extend\user\Passport;

class User extends Passport
{
    public $userType = 'members';
}