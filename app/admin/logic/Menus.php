<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25
 * Time: 13:19
 */

namespace app\admin\logic;

use think\Db;
use think\Model;

class Menus extends Model
{
    /**
     * 获取菜单分组
     * @param $params
     * @return array
     */
    public function getMenuTab($params)
    {
        return Db::table('menus')->where('parent', '0')->select();
    }

    /**
     * 获取菜单
     * @param $params
     * @param $active 后台菜单选中标识
     * @return array
     */
    public function &getMenu($params, &$active)
    {
        //是超级管理员
        if ($params['super']) {
            $parentsId = Db::table('menus')
                ->field('group_id, parent')
                ->where(['controller' => CONTROLLER_NAME, 'action' => ACTION_NAME, 'type' => 'admin', 'display' => 'true'])
                ->find();
            if ($parentsId['group_id'] == 0) return [];
            $active = $parentsId['parent'];
            return $this->menuAll($parentsId['group_id']);
        } else {
            //不是超级管理员，查询当前用户身份，或取菜单
        }
        return [];
    }

    /**
     * 获取菜单
     * @param $parentId
     * @return array
     */
    public function &menuAll($parentId = null)
    {
        $menus = $this->getChildren($parentId);
        foreach ($menus as $key => &$value) {
            $value['children'] = $this->menuAll($value['id']);
        }
        return $menus;
    }


    /**
     * 获取子类
     * @param $parentId
     * @param $type 是否包函自己
     * @return array
     */
    public function getChildren($parentId, $type = false)
    {
        $filter = ['type' => 'admin', 'display' => 'true'];
        !empty($parentId) && (!$type && $filter['parent'] = $parentId) || ($type && $filter['id'] = $parentId);
        $result = Db::table('menus')->where($filter)->order(['order' => 'asc'])->select();
        if($type){
            $result[0]['children'] = $this->getChildren($result[0]['id']);
        }
        return $result;
    }

    /**
     * 获取一级菜单 | 包函一级菜单下的二级菜单
     * @param $type
     * @return array
     */
    public function getOneLevel($type = false)
    {
        $oneLevel = Db::table('menus')->where(['parent' => 0])->select();
        if ($type) return $oneLevel;
        foreach ($oneLevel as $key => &$value) {
            $value['children'] = $this->getChildren($value['id']);
        }
        return $oneLevel;
    }
}