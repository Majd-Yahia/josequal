<?php
return [
    [
        'name' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'heroicon-o-home',
        'permission' => 'map.index',
    ],
    [
        'name' => 'Files',
        'route' => 'admin.files.index',
        'icon' => 'heroicon-o-arrow-up-on-square',
        'permission' => 'files.index',
    ],
    [
        'name' => 'Users',
        'route' => 'admin.users.index',
        'icon' => 'heroicon-o-users',
        'permission' => 'users.index',
    ],
    [
        'name' => 'Roles',
        'route' => 'admin.roles.index',
        'icon' => 'heroicon-o-shield-check',
        'permission' => 'roles.index',
    ],
];
