<li class="nav-item">
    <a class="nav-link text-white @if($active) active @endif" data-bs-toggle="collapse" aria-expanded="{{ $active }}" href="#workerMenu">
        <i class="material-icons-round">donut_small</i>
        <strong class="sidenav-normal  ms-2  ps-1"> @lang('Tecnici') <b class="caret"></b></strong>
    </a>
    <div class="collapse @if($active) show @endif " id="workerMenu">
        <ul class="nav">

            {!! \App\Helpers\Menu::generateItem(route('workers.index'), \App\Helpers\Acl::PERMISSION_ENV_WORKERS, __('Visualizza tutti i tecnici'), Route::is('workers.index')) !!}
            {!! \App\Helpers\Menu::generateItem(route('workers.create'), \App\Helpers\Acl::PERMISSION_ENV_WORKERS, __('Aggiungi un nuovo tecnico'), Route::is('workers.create')) !!}

        </ul>
    </div>
</li>
