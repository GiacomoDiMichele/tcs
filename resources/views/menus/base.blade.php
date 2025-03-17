<ul class="navbar-nav">

    {!! \App\Helpers\Menu::generateItem(route('home'), \App\Helpers\Acl::PERMISSION_ENV_USERS, __('menu.dashboard'), Route::is('home'),'dashboard') !!}
    @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$users), 'menus.sections.user',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.user'))])
    @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$relations), 'menus.sections.relation',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.relation'))])
    @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$customers), 'menus.sections.customer',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.customer'))])
    @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$materials), 'menus.sections.material',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.material'))])
    @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$workers), 'menus.sections.worker',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.worker'))])
    @if (Auth::user()->employment_role && Auth::user()->employment_role->office_reports_active === 1)
        @includeWhen(App\Helpers\Helper::permissionTo(\App\Helpers\Menu::$office_reports), 'menus.sections.office_report',['active' => \App\Helpers\Helper::checkMenuActive(config('menus.office_report'))])   
    @endif
</ul>
