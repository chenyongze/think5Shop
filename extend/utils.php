<?php
namespace extend;

class utils
{
    /**
     * 数组更换key
     * @param $items
     * @param $key
     * @param bool $is_resultset_array
     * @return array|bool
     */
    public static function &arrayChangeKey(&$items, $key, $is_resultset_array = false)
    {
        if (is_array($items)) {
            $result = array();
            if (!empty($key) && is_string($key)) {
                foreach ($items as $_k => $_item) {
                    if ($is_resultset_array) {
                        $result[$_item[$key]][] = &$items[$_k];
                    } else {
                        $result[$_item[$key]] = &$items[$_k];
                    }
                }
                unset($items);
                return $result;
            }
        }
        return false;
    }

    /**
     * @param $items
     * @param $parentId
     * @return array
     */
    public static function &generateTree(&$items, $parentId)
    {
        $tree = array();
        if (!is_array($items)) return $tree;
        foreach ($items as $item) {
            if (isset($items[$item[$parentId]])) {
                $items[$item[$parentId]]['children'][] = &$items[$item['id']];
            } else {
                $tree[] = &$items[$item['id']];
            }
        }
        unset($items);
        return $tree;
    }
}