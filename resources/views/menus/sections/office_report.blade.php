<li class="nav-item">
    <a class="nav-link text-white @if($active) active @endif" data-bs-toggle="collapse" aria-expanded="{{ $active }}" href="#office_reports">
        <i class="material-icons">settings</i>
        <strong class="sidenav-normal  ms-2  ps-1">Report ufficio<b class="caret"></b></strong>
    </a>
    <div class="collapse @if($active) show @endif " id="office_reports">
        <ul class="nav">

            {!! \App\Helpers\Menu::generateItem(route('office_reports.index'), \App\Helpers\Acl::PERMISSION_ENV_OFFICE_REPORTS, __('Visualizza i tuoi report'), Route::is('office_reports.index')) !!}
            {!! \App\Helpers\Menu::generateItem(route('office_reports.create'), \App\Helpers\Acl::PERMISSION_ENV_OFFICE_REPORTS, __('Crea report ufficio'), Route::is('office_reports.create')) !!}

        </ul>
    </div>
</li>
