<li class="nav-item">
    <a class="nav-link text-white @if($active) active @endif" data-bs-toggle="collapse" aria-expanded="{{ $active }}" href="#materialsMenu">
        <i class="material-icons">settings</i>
        <strong class="sidenav-normal  ms-2  ps-1">Materiali<b class="caret"></b></strong>
    </a>
    <div class="collapse @if($active) show @endif " id="materialsMenu">
        <ul class="nav">

            {!! \App\Helpers\Menu::generateItem(route('materials.index'), \App\Helpers\Acl::PERMISSION_ENV_MATERIALS, __('Materiali'), Route::is('materials.index')) !!}
            {!! \App\Helpers\Menu::generateItem(route('materials.create'), \App\Helpers\Acl::PERMISSION_ENV_MATERIALS, __('Aggiungi un materiale'), Route::is('materials.create')) !!}

        </ul>
    </div>
</li>
