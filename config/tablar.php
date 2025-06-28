<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Tablar',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Tablar',
    'current_version' => 'v11.11',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'assets/logobatalla-tabla.png',
            // 'path' => 'assets/tablar-logo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'navbar-overlap',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => null,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => false,

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => false,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Tus Datos',
            'icon' => 'ti ti-user-check',
            'route' => 'admin.dato',
            
        ],

        [
            'text' => 'Actividad',
            'url' => '',
            'icon' => 'ti ti-device-desktop-share',
            'active' => ['admin/eventos*'],
            'submenu' => [
                [
                    'text' => 'Capacitación',
                    'route' => 'admin.capacitaciones.index',
                    'icon' => 'ti ti-device-desktop-share',
                ],
                [
                    'text' => 'Eventos',
                    'route' => 'admin.eventos.index',
                    'icon' => 'ti ti-calendar-week',
                ]
            ],
        ],

        [
            'text' => 'Evaluación',
            'route' => 'admin.actividads.index',
            'icon' => 'ti ti-user-edit',
            'active' => ['admin/actividads*'],
            'submenu' => [
                [
                    'text' => 'Programador',
                    'route' => 'admin.actividads.evaluacionprogramador.index',
                    'icon' => 'ti ti-brand-laravel',
                    'can'=>'admin.actividads.evaluacionprogramador.index',
                ],
                [
                    'text' => 'Evaluación Comando',
                    'route' => 'admin.actividads.index',
                    'icon' => 'ti ti-user-edit',
                    'can'=>'admin.actividads.index',
                ]
            ],
        ],
        [
            'text' => 'Comandos',
            'url' => 'support3',
            'icon' => 'ti ti-horse',
            'active' => ['admin/ejecutoras*'],
            'submenu' => [
                [
                    'text' => 'Nacional',
                    'route'=>'admin.ejecutoras.index',
                    'icon' => 'ti ti-home',
                    'can'=>'admin.ejecutoras.index',
                ],
                [
                    'text' => 'Ver Comandos',
                    'route' => 'admin.ejecutoras.vercomando.index',
                    'icon' => 'ti ti-home-2',
                    'can'=>'admin.ejecutoras.vercomando.index',
                ],
            ],
            
        ],
        [
            'text' => 'Lista',
            'url' => '#',
            'icon' => 'ti ti-clipboard-text',
            'active' => ['admin/datospersonals*'],
            'submenu' => [
                [
                    'text' => 'Nacional',
                    'route'=>'admin.datospersonals.index',
                    'icon' => 'ti ti-alien',
                    'active' => ['admin.datospersonals.index'],
                    'can'=> 'admin.datospersonals.index',
                    
                ],
                [
                    'text' => 'Departamental',
                    'route'=>'admin.datospersonals.departamento.index',
                    'icon' => 'ti ti-battery-4',
                    'active' => ['support2'],
                    'can'=>'admin.datospersonals.departamento.index',
                ],
                [
                    'text' => 'Provincial',
                    'route' => 'admin.datospersonals.provincia.index',
                    'icon' => 'ti ti-battery-3',
                    'can'=>'admin.datospersonals.provincia.index',
                ],
                [
                    'text' => 'Distrito',
                    'route' => 'admin.datospersonals.distrito.index',
                    'icon' => 'ti ti-battery-1',
                    'can'=>'admin.datospersonals.distrito.index',
                ]
            ],
            
        ],

        [
            'text' => 'Estadística',
            'url' => '#',
            'icon' => 'ti ti-chart-dots',
            'active' => ['admin.estadisticas*'],
            'submenu' => [
                [
                    'text' => 'Datos',
                    'route' => 'admin.estadisticas.index',
                    'icon' => 'ti ti-article',
                    // 'can'=>'admin.estadisticas.index',
                ],
                [
                    'text' => 'Encuesta',
                    'url' => '#',
                    'icon' => 'ti ti-article',
                    'can'=>'admin.estadisticas.index',
                ]
            ],
        ],

        [
            'text' => 'Roles',
            'url' => '#',
            'icon' => 'ti ti-brand-github',
            'active' => ['admin/users*'],
            // 'can'=>'admin.users.index',
            'submenu' => [
                [
                    'text' => 'Programador',//del comando menos yo
                    'route' => 'admin.users.index',
                    'icon' => 'ti ti-brand-laravel',
                    'active' => ['admin/users/index*'],
                    // 'can'=>'admin.users.index',
                ],
                [
                    'text' => 'Nacional',//del comando menos yo
                    'route' => 'admin.users.nacional.index',
                    'icon' => 'ti ti-building-skyscraper',
                    'active' => ['admin/users/index*'],
                    'can'=>'admin.users.nacional.index',
                ],
                [
                    'text' => 'Regional',//del comando
                    'route' => 'admin.users.regional.index',
                    'icon' => 'ti ti-buildings',
                    'active' => ['admin/users/regional/index*'],
                    'can'=>'admin.users.regional.index',
                ],
                [
                    'text' => 'Provincial',//del comando
                    'route' => 'admin.users.provincial.index',
                    'icon' => 'ti ti-building-community',
                    'active' => ['admin/users/provincial*'],
                    'can'=>'admin.users.provincial.index',
                ],
                [
                    'text' => 'Distrital',//del comando
                    'route' => 'admin.users.distrital.index',
                    'icon' => 'ti ti-building-circus',
                    'active' => ['admin/users/distrital*'],
                    'can'=>'admin.users.distrital.index',
                ],
            ],
            
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://livewire.laravel.com
    |
    */

    'livewire' => true,
];
