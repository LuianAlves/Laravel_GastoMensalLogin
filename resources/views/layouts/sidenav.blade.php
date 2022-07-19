<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <i class="bx bx-calculator text-secondary fs-2"></i>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize;">Gastos</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- DIVIDER :: Cálcular Gastos -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>

        <!-- Home -->
        <li class="menu-item active">
            <a href="{{route('home')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
            </a>
        </li>

        <!-- DIVIDER :: Cálcular Gastos -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Cálculo</span>
        </li>

        <li class="menu-item">
            <a href="{{route('gastos.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Gastos</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{route('entradas.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Layouts">Entradas</div>
            </a>
        </li>

        <!-- DIVIDER :: Config Sistema -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Config Sistema</span>
        </li>
        
        <li class="menu-item">
            <a href="{{route('usuario.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Novo Usuário</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{route('categoria.gastos.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Categoria de Gastos</div>
            </a>
        </li>

    </ul>
</aside>