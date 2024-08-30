<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'devider',
            'forms' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                
            ],
            'crud' => [
                'icon' => 'users',
                'title' => 'User management',
                'sub_menu' => [
                    'user-management' => [
                        'icon' => '',
                        'route_name' => 'user-mangment',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'User Management'
                    ],
                    
                ],
            ],
           'properties' => [
    'icon' => 'users',
    'title' => 'Properties',
    'sub_menu' => [
        'properties-management' => [
            'icon' => '',
            'route_name' => 'properties.create',

            'params' => [
                'layout' => 'side-menu'
            ],
            'title' => 'Properties Management'
        ],
    ],
],
            'bookings' => [
                'icon' => 'users',
                'title' => 'Bookings',
                'sub_menu' => [
                    'bookings-management' => [
                        'icon' => '',
                        'route_name' => 'bookings.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Bookings Management'
                    ],
                   
                ],
            ],
        ];
    }
}
