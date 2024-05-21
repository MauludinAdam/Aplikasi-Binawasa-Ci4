<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
				'csrf'                      => \CodeIgniter\Filters\CSRF::class,
				'toolbar'                   => \CodeIgniter\Filters\DebugToolbar::class,
				'honeypot'                  => \CodeIgniter\Filters\Honeypot::class,
                'filteradmin'               => \App\Filters\FilterAdmin::class,
                'filteradminbekasitimur'    => \App\Filters\FilterAdminBekasiTimur::class,
                'filteradminrawalumbu'      => \App\Filters\FilterAdminRawalumbu::class,
                'filteradminjatiasih'       => \App\Filters\FilterAdminJatiasih::class,
                'filteradminpondokmelati'   => \App\Filters\FilterAdminPondokmelati::class,
                'filteradminjatisampurna'   => \App\Filters\FilterAdminJatisampurna::class,
                'filteradminbantargebang'   => \App\Filters\FilterAdminBantargebang::class,
                'filteradminbekarat'        => \App\Filters\FilterAdminBekarat::class,
                'filteradminbekasilatan'    => \App\Filters\FilterAdminBekasilatan::class,
                'filteradminbekasut'        => \App\Filters\FilterAdminBekasut::class,
                'filteradminmedansat'       => \App\Filters\FilterAdminMedansat::class,
                'filteradminmustikajaya'    => \App\Filters\FilterAdminMustikajaya::class,
                'filteradminpondokgede'     => \App\Filters\FilterAdminPondokgede::class,
            ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filteradmin'    => ['except' =>[
                'auth', 'auth/*',
                
            ]],
            'filteradminbekasitimur'  => ['except' => [
                'auth', 'auth/*',
            ]],
            'filteradminbekasilatan'  => ['except' => [
                'auth', 'auth/*',
            ]],
            'filteradminrawalumbu'  => ['except' => [
                'auth', 'auth/*',
            ]],
            'filteradminjatiasih'  => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminpondokmelati' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminjatisampurna'  => ['except' =>[

                'auth', 'auth/*',
            ]],
            'filteradminbantargebang' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminbekarat' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminbekasut' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminmedansat' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminmustikajaya' => ['except' => [

                'auth', 'auth/*',
            ]],
            'filteradminpondokgede'   => ['except' => [

                'auth', 'auth/*',
            ]]
        ],
        'after' => [
           'filteradmin'     => ['except' => [
            'auth', 'auth/*',
            'home', 'home/*',
            'user', 'user/*',
            'bekatim', 'bekatim/*',
            'bekasilatan', 'bekasilatan/*',
            'bekarat', 'bekarat/*',
            'bekasut', 'bekasut/*',
            'medansat', 'medansat/*',
            'mustikajaya', 'mustikajaya/*',
            'rawalumbu', 'rawalumbu/*',
            'bantargebang', 'bantargebang/*',
            'jatisampurna', 'jatisampurna/*',
            'jatiasih', 'jatiasih/*',
            'pondokgede', 'pondokgede/*',
            'pondokmelati', 'pondokmelati/*',
           ]],
           'filteradminbekasitimur'  => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_bekatim', 'admin_bekatim/*',
        ]],
           'filteradminbekasilatan'  => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_bekasilatan', 'admin_bekasilatan/*',
        ]],
           'filteradminrawalumbu'  => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_rawalumbu', 'admin_rawalumbu/*',
        ]],
           'filteradminjatiasih'  => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_jatiasih', 'admin_jatiasih/*',
        ]],
        'filteradminpondokmelati' => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_pondokmelati/*',
        ]],
        'filteradminjatisampurna' => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_jatisampurna', 'admin_jatisampurna/*'
        ]],
        'filteradminbantargebang' => ['except' => [
            'auth', 'auth/*',
           'binawasa', 'binawasa/*',
            'admin_bantargebang', 'admin_bantargebang/*',
        ]],
        'filteradminbekarat'    => ['except' => [
            'auth', 'auth/*',
           'binawasa', 'binawasa/*',
            'admin_bekarat', 'admin_bekarat/*',
        ]],
        'filteradminbekasut'    => ['except' => [
            'auth', 'auth/*',
           'binawasa', 'binawasa/*',
            'admin_bekasut', 'admin_bekasut/*',
        ]],
        'filteradminmedansat'   => ['except' => [
            'auth', 'auth/*',
           'binawasa', 'binawasa/*',
            'admin_medansat', 'admin_medansat/*',
        ]],
        'filteradminmustikajaya' => ['except' => [
            'auth', 'auth/*',
           'binawasa', 'binawasa/*',
            'admin_mustikajaya', 'admin_mustikajaya/*',
        ]],
        'filteradminpondokgede'   => ['except' => [
            'auth', 'auth/*',
            'binawasa', 'binawasa/*',
            'admin_pondokgede', 'admin_pondokgede/*',  
        ]],
           
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
