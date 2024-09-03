<?php

return [
    [
        'name' => 'Dashboards',
        'icon' => 'menu-icon tf-icons bx bx-home-circle',
        'slug' => 'admin.dashboard', // parent slug -> should be route name
        'submenu' => [
            [
                'url' => '/',
                'name' => 'Analytics',
                'slug' => 'admin.dashboard', // prefixed with parent slug
            ],
            [
                'url' => '/dashboard/crm',
                'name' => 'CRM',
                'slug' => 'admin.dashboard', // prefixed with parent slug
            ],
        ],
    ],
    [
        'name' => 'จัดการเว็บไซต์',
        'icon' => 'menu-icon tf-icons bx bx-home-circle',
        'slug' => 'admin.website', // parent slug
        'submenu' => [
            [
                'name' => 'หน้าหลัก',
                'slug' => 'admin.dashboard', // prefixed with parent slug
            ],
            [
                'name' => 'เกี่ยวกับเรา',
                'slug' => 'admin.about', // prefixed with parent slug
            ],
            [
                'name' => 'กิจกรรม',
                'slug' => 'admin.dashboard', // prefixed with parent slug
            ],
            [
                'name' => 'ข่าวสาร',
                'slug' => 'admin.news', // prefixed with parent slug
            ],
            [
                'name' => 'ช่องทางติดต่อ',
                'slug' => 'admin.dashboard', // prefixed with parent slug
            ],

        ],
    ],
    [
        'name' => 'รายการติดต่อ',
        'icon' => 'menu-icon tf-icons bx bx-home-circle',
        'slug' => 'admin.dashboard', // parent slug
    ],
    [
        'name' => 'จัดการผู้ใช้งาน',
        'icon' => 'menu-icon tf-icons bx bx-group',
        'slug' => 'admin.users', // parent slug
    ],

];
