<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/5/9
 * Time: 22:27
 */

namespace app\index\model;

use \think\model;

class Members extends Model
{
    protected $pk = 'member_id';
    protected $createTime = ['regtime'];
}