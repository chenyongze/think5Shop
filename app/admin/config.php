<?php
//配置文件
return [
    'script' => [
        'js' => [
            [
                'controller' => ['panel'],
                'action' => ['menu'],
                'script' => [//admin-menu-list.js
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.dataTables.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.dataTables.bootstrap.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/selfJs/admin/panel/menu-list.js"></script>'
                ]
            ],
            [
                'controller' => ['index'],
                'action' => ['index'],
                'script' => [
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery-ui-1.10.3.custom.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.ui.touch-punch.min.js></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.slimscroll.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.easy-pie-chart.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/jquery.sparkline.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/flot/jquery.flot.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/flot/jquery.flot.pie.min.js"></script>',
                    '<script type="text/javascript" src="' . __PUBLIC__ . '/static/assets/js/flot/jquery.flot.resize.min.js"></script>',
                ]
            ],
        ],
        'css' => [
            [
                'controller' => [''],
                'action' => [''],
                'script' => [
                    '<link rel="stylesheet" href="' . __PUBLIC__ . '/static/assets/css/font-awesome.min.css" />'
                ]
            ],
        ],
    ]
];