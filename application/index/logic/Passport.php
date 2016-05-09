<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\index\logic;
use \think\Model;

class Passport extends \extend\User\Passport
{

    public function test()
    {
        var_dump(LIB_PATH);
        var_dump($this->title);
        //echo '来了';
    }
}