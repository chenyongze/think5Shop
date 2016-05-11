<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/6
 * Time: 16:13
 * Descriptions 微信基本配置
 */

return [
    'requestUrl' => [
        'menu' => [
            'url' => 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=',
            'type' => 'get',
        ],
        'accessToken' => [
            'url' => 'https://api.weixin.qq.com/cgi-bin/token',
            'type' => 'get',
        ],
    ],
    'menu' => '{
             "button":[
             {
                  "type":"click",
                  "name":"今日歌曲",
                  "key":"V1001_TODAY_MUSIC"
              },
              {
                   "name":"菜单",
                   "sub_button":[
                   {
                       "type":"view",
                       "name":"搜索",
                       "url":"http://www.soso.com/"
                    },
                    {
                       "type":"view",
                       "name":"视频",
                       "url":"http://v.qq.com/"
                    },
                    {
                       "type":"click",
                       "name":"赞一下我们",
                       "key":"V1001_GOOD"
                    }]
               }]
            }'
];