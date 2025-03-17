<li class="nav-item">
    <a class="nav-link text-white @if($active) active @endif" data-bs-toggle="collapse" aria-expanded="{{ $active }}" href="#customersMenu">
        <i class="material-icons">face</i>
        <strong class="sidenav-normal  ms-2  ps-1"> Clienti <b class="caret"></b></strong>
    </a>
    <div class="collapse @if($active) show @endif " id="customersMenu">
        <ul class="nav">

            {!! \App\Helpers\Menu::generateItem(route('customers.index'), \App\Helpers\Acl::PERMISSION_ENV_CUSTOMERS, __('Clienti'), Route::is('customers.index')) !!}
            {!! \App\Helpers\Menu::generateItem(route('customers.create'), \App\Helpers\Acl::PERMISSION_ENV_CUSTOMERS, __('Aggiungi un cliente'), Route::is('customers.create')) !!}

        </ul>
    </div>
</li>
