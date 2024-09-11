<?php

$menus = [
    ['หน้าแรก', 'menu-icon tf-icons bx bx-home-circle', 'admin.dashboard'],
    ['Inbox', 'menu-icon tf-icons bx bxs-inbox', 'admin.contact'],
    ['ข่าวสาร', 'menu-icon tf-icons bx bxs-news', 'admin.news'],
    ['กิจกรรม', 'menu-icon tf-icons bx bx-calendar', 'admin.activity'],
    ['จัดการผู้ใช้งาน', 'menu-icon tf-icons bx bx-group', 'admin.users'],
    ['เกี่ยวกับเรา', 'menu-icon tf-icons bx bx-help-circle', 'admin.about'],
];

return array_map(function ($menu) {
    return [
        'name' => $menu[0],
        'icon' => $menu[1],
        'slug' => $menu[2],
    ];
}, $menus);
