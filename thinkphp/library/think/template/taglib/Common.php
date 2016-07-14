<?php

namespace think\template\taglib;

use think\template\TagLib;

/**
 * 自定义标签库解析类
 * @category   Think
 * @package  Think
 * @subpackage  Driver.Taglib
 * @author    liu21st <liu21st@gmail.com>
 */
class Common extends Taglib
{
    // 标签定义
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'select' => ['attr' => 'rows, label, value, name, required, selected, class, callback', 'close' => 0, 'expression' => true],
        'region' => ['value, name, callback, required, label', 'close' => 0, 'expression' => true],
        'image' => ['attr' =>'name, value, checked', 'close' => 0, 'expression' => true],
        'flashImage' => ['attr' => 'name, value, checked', 'close' => 0, 'expression' => true],
        'imageArray' => ['value', 'close' => 0, 'expression' => true],
        'html' => ['checked', 'close' => 0, 'expression' => true],
    ];

    /**
     * 魔术方法
     * @param $method 方法名
     * @param $args 参数
     * @return string
     */
    public function __call($method, $args)
    {
        $result = [];
        if (!empty($args[0]['expression'])) {
            $expression = ltrim(rtrim($args[0]['expression'], ')'), '(');
            $params = explode(' ', $expression);
            foreach ($params as $param) {
                $tmp = explode('=', $param);
                $value = $tmp[1];
                if (strpos($param, '$')) {
                    $tmp[1] = str_replace('$', '', $tmp[1]);
                    $value = $this->tpl->data[$tmp[1]];
                }
                $result[$tmp[0]] = $value;
            }
            $inputContent = (new \extend\help\Common())->init($method, $result);
            return $inputContent . $args[1];
        }
    }
}