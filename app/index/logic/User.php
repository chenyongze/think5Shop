<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\index\logic;



class User extends \think\user\Passport
{
    public $userType = 'members';
    
}