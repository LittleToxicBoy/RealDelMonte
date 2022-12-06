<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main" style="z-index: 2;"">
    <style>
        .icon{
            position: initial !important;
            transform: initial !important;
        }
    </style>
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Logo_de_los_Pueblos_M%C3%A1gicos_de_M%C3%A9xico.svg/1200px-Logo_de_los_Pueblos_M%C3%A1gicos_de_M%C3%A9xico.svg.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Real del Monte</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    @if (Auth::user()->tipo == 'AdministradorGeneral')
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::is('eventos')) {{'active'}} @endif" href="{{route("eventos")}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Eventos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::is('lugares')) {{'active'}} @endif" href="{{ route('lugares') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lugares</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::is('negocios')) {{'active'}} @endif" href="{{ route('negocios') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Negocios</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administracion</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if (Request::is('administrar')) {{'active'}} @endif" href="{{ route('adm') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Administrar</span>
                </a>
            </li>
        </ul>
    </div>
    @endif

    <div class="sidenav-footer mx-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-primary btn-sm mb-0 w-100" style="margin-top: 80%;" type="submit">Cerrar sesion</button>
        </form>
    </div>
</aside>
