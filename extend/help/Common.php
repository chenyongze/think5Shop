<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 2016/7/2
 * Time: 22:53
 * 帮助类 常用挂件
 */

namespace extend\help;

use think\Controller;

class Common extends Controller
{
    public function init($method, &$params)
    {
        $this->view->engine->layout(false);
        return $this->$method($params);
    }

    protected function _select(&$params)
    {
		!isset($params['id']) && $params['id'] = substr(md5(uniqid()), 0, 6);
		$this->assign('params', $params);
		$rows = [0 => 0, 1 => 1, 2 => 2];
        $this->assign('rows', $rows);
        return $this->fetch('help@common/select');
    }

    /**
     * 单个图片上传
     * @param $params
     * @return mixed
     */
    protected function _image(&$params)
    {
        $this->assign('id', uniqid());
        $this->assign('name', 'avatar');
        $this->assign('value', 'asdfasdfsdfds');
        return $this->fetch('help@common/image');
    }

    /**
     * 多个图片上传
     * @param $params
     * @return mixed
     */
    protected function _imageArray(&$params)
    {
        return $this->fetch('help@common/imageArray');
    }

    /**
     * 单个图片支持裁剪
     * @param $params
     * @return mixed
     */
    protected function _flashImage(&$params)
    {
        return $this->fetch('help@common/flashImage');
    }

    /**
     * 地区三级联动
     * @param $params
     * @return mixed
     */
    protected function _region(&$params)
    {
		!isset($params['id']) && $params['id'] = substr(md5(uniqid()), 0, 6);
		!isset($params['callback']) && $params['callback'] = '';
		$this->assign('params', $params);
		$rows = [0 => 0, 1 => 1, 2 => 2];
        $this->assign('rows', $rows);
        return $this->fetch('help@common/region');
    }

    /**
     * 文本编辑器
     * @param $params
     * @return mixed
     */
    protected function _html(&$params)
    {
        return $this->fetch('help@common/html');
    }
}