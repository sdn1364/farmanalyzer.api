<?php

return [
    'dashboards' => [
        'name' => 'dashboards',
        'title' => 'فارم آنالایزر',
        'icon' => 'fad fa-chart-pie',
        'link' => 'sellsDashboard ticketDashboard statsDashboard',
        'body' => [
            [
                'type' => 'title',
            ],
            [
                'type' => 'link',
                'name' => 'فروش و مدیریت مشتری',
                'link' => 'sellsDashboard',
                'title' => 'sellsDashboard'
            ],
            [
                'type' => 'link',
                'name' => 'آمار وبسایت',
                'link' => '/statsDashboard',
                'title' => 'statsDashboard'
            ],
        ]
    ],
    'references' => [
        'name' => 'references',
        'title' => 'جداول مرجع',
        'icon' => 'fad fa-clone',
        'link' => 'city province expert vaccine_category vaccine_method vaccine_company worker disease',
        'body' => [
            [
                'type' => 'title',
            ],
            [
                'type' => 'sub',
                'title' => 'province',
                'name' => 'استان‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'province',
                        'name' => 'لیست استان‌ها',
                        'link' => 'province.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/province/create',
                        'name' => 'استان جدید',
                        'link' => 'province.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'city',
                'name' => 'شهر‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'city',
                        'name' => 'لیست شهرها',
                        'link' => 'city.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/city/create',
                        'name' => 'شهر جدید',
                        'link' => 'city.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'expert',
                'name' => 'کارشناس‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'expert',
                        'name' => 'لیست کارشناس‌ها',
                        'link' => 'expert.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/expert/create',
                        'name' => 'کارشناس جدید',
                        'link' => 'expert.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'vaccine_category',
                'name' => 'دسته‌بندی واکسن‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'vaccine_category',
                        'name' => 'لیست دسته‌بندی واکسن‌ها',
                        'link' => 'vaccine_category.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/vaccine/create',
                        'name' => 'دسته‌بندی واکسن جدید',
                        'link' => 'vaccine_category.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'vaccine',
                'name' => 'واکسن‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'vaccine',
                        'name' => 'لیست واکسن‌ها',
                        'link' => 'vaccine.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/vaccine/create',
                        'name' => 'واکسن جدید',
                        'link' => 'vaccine.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'vaccine_method',
                'name' => 'متد واکسیناسیون',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'vaccine_method',
                        'name' => 'لیست متدها',
                        'link' => 'vaccine_method.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/vaccine_method/create',
                        'name' => 'متد جدید',
                        'link' => 'vaccine_method.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'vaccine_company',
                'name' => 'شرکت‌های سازنده واکسن',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'vaccine_company',
                        'name' => 'لیست شرکت‌ها',
                        'link' => 'vaccine_company.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/vaccine_company/create',
                        'name' => 'شرکت جدید',
                        'link' => 'vaccine_company.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'worker',
                'name' => 'کارگران',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'worker',
                        'name' => 'لیست کارگران',
                        'link' => 'worker.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/worker/create',
                        'name' => 'کارگر جدید',
                        'link' => 'worker.create'
                    ],
                ]
            ],
        ]
    ],
    'farming' => [
        'name' => 'farming',
        'title' => 'جداول مرغداری',
        'icon' => 'fad fa-farm',
        'link' => 'farmer farm analysis herd',
        'body' => [
            [
                'type' => 'title',
            ],
            [
                'type' => 'sub',
                'title' => 'farmer',
                'name' => 'مرغدارها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'farmer',
                        'name' => 'لیست مرغدارها',
                        'link' => 'farmer.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/farmer/create',
                        'name' => 'مرغدار جدید',
                        'link' => 'farmer.create'
                    ],
                ]
            ],
            [
                'type' => 'sub',
                'title' => 'farm',
                'name' => 'مرغداری‌ها',
                'submenu' => [
                    [
                        'type' => 'link',
                        'title' => 'farm',
                        'name' => 'لیست مرغداری‌ها',
                        'link' => 'farm.index'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/farmer/create',
                        'name' => 'مرغداری جدید',
                        'link' => 'farm.create'
                    ],
                    [
                        'type' => 'link',
                        'title' => '/farmer/create',
                        'name' => 'گله جدید',
                        'link' => 'herd.create'
                    ],
                ]
            ],
        ]
    ]
];
