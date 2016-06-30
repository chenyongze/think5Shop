<?php
//配置文件
return [
    'script' => [
        'js' => [
            [
                'controller' => ['panel'],
                'action' => ['menu'],
                'script' => [//admin-menu-list.js
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.dataTables.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.dataTables.bootstrap.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/selfJs/admin/panel/menu-list.js"></script>'
                ]
            ],
            [
                'controller' => ['index'],
                'action' => ['index'],
                'script' => [
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery-ui-1.10.3.custom.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.ui.touch-punch.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.slimscroll.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.easy-pie-chart.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/jquery.sparkline.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/flot/jquery.flot.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/flot/jquery.flot.pie.min.js"></script>',
                    '<script type="text/javascript" src="' . STATIC_SCRIPT_PATH . 'static/js/flot/jquery.flot.resize.min.js"></script>',
                ]
            ],
        ],
        'css' => [
            [
                'controller' => [''],
                'action' => [''],
                'script' => [
                    '<link rel="stylesheet" href="' . STATIC_SCRIPT_PATH . 'static/css/font-awesome.min.css" />'
                ]
            ],
        ],
    ]
];