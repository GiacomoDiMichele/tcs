<li class="nav-item">
    <a class="nav-link text-white @if($active) active @endif" data-bs-toggle="collapse" aria-expanded="{{ $active }}" href="#customerMenu">
        <i class="material-icons-round">donut_small</i>
        <strong class="sidenav-normal  ms-2  ps-1"> Rapporti di lavoro <b class="caret"></b></strong>
    </a>
    <div class="collapse @if($active) show @endif " id="customerMenu">
        <ul class="nav">

            {!! \App\Helpers\Menu::generateItem(route('relations.index'), \App\Helpers\Acl::PERMISSION_ENV_RELATIONS, __('Rapporti di lavoro'), Route::is('relations.index')) !!}
            {!! \App\Helpers\Menu::generateItem(route('relations.create'), \App\Helpers\Acl::PERMISSION_ENV_RELATIONS, __('Crea un report'), Route::is('relations.create')) !!}
            {{-- {!! \App\Helpers\Menu::generateItem(route('relations.create'), \App\Helpers\Acl::PERMISSION_ENV_RELATIONS, __('Create a relation'), Route::is('')) !!} --}}

        </ul>
    </div>
</li>
