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
use extend;

class Menus extends Model
{
    /**
     * 获取同级菜单
     * @param $params
     * @param $parent
     * @return array
     */
    public function getMenuBrothers($parent = 0, $params)
    {
        //验证权限???
        return Db::table('menus')->where('parent', $parent)->order(['order' => 'asc'])->select();
    }

    /**
     * 获取菜单
     * @param $params
     * @return array
     */
    public function &getMenu($params)
    {
		$where = [
			'disabled' => 'true'
		];
        if ($params['is_super'] != 'true') {
			//不是超级管理员，查询当前用户身份，或取菜单
			$roles = Db::table('roles')->where(['role_id' => $params['role_id']])->select();
            //(['controller' => CONTROLLER_NAME, 'action' => ACTION_NAME, 'type' => 'admin', 'display' => 'true'])
            $group = Db::table('menus')
                ->field('id')
                ->where(['parent' => '0'])
                ->where(['id' => ['in', explode(',', trim($parentsId['path'], ','))]])
                ->find();
            if (!$group){
				return [];
			}
            $active = $parentsId['parent'];
            return $this->menuAll($group['id']);
        }

		$menuList = Db::table('menus')->where($where)->order(['order_by' => 'asc'])->select();
		$menuList = extend\utils::arrayChangeKey($menuList, 'id');
        $result = extend\utils::generateTree($menuList, 'parent_id');
        return $result;
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
        if ($type) {
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

    /**
     * 获取菜单面包屑
     * @param $menuPath 菜单路径
     * @return array
     */
    public function menuBread($menuPath)
    {
        $pathId = explode(',', trim($menuPath, ','));
        if (!$pathId) {
            return [];
        }
        $tmp = Db::table('menus')->field('title, id, parent')->select($pathId);
        //排序
        $result = [];
        foreach ($tmp as $key => $value){
            $result[array_search($value['id'], $pathId)] = $value;
        }
        return $result;
    }

    /**
     * 保存菜单
     * @param array $post
     * @return bool
     */
    public function saveMenus(Array $post)
    {
        $parentId = isset($post['menus']['parent']) ? $post['menus']['parent'] : '';
        $data = $this->getMenuData($parentId);
        $post['menus']['path'] = $data['path'];
        $post['menus']['group_name'] = $data['path'];
        $jg = Db::table('menus')->insert($post['menus']);
        return true;
    }

    /**
     * 获取新增菜单所需数据
     * @param $parent
     * @return array
     */
    public function getMenuData($parent)
    {
        if(!$parent) return '';
        $path = Db::table('menus')->field('path, group_name')->find($parent);
        $path['path'] .= ',' . $parent;
        return $path;
    }

    /**
     * 获取菜单详情
     * @param $menuId
     * @return array
     */
    public function getMenuDetails($menuId)
    {

    }

}