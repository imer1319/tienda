<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="{{ route('pages.home') }}">
                <h3 class="text-warning">{{ config('app.name', 'Laravel') }}</h3>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between {{ Route::is('admin.pedidos.*') ? 'active' : '' }}"
                            href="{{ route('admin.pedidos.index') }}">
                            <span>
                                <i class="ni ni-cart text-orange"></i>
                                <span class="nav-link-text ml-3">Pedidos</span>
                            </span>
                            @if (\App\Models\Pedido::where('status', 'PENDIENTE')->count())
                                <span class="badge badge-success">
                                    {{ \App\Models\Pedido::where('status', 'PENDIENTE')->count() }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between {{ Route::is('admin.procesos.*') ? 'active' : '' }}"
                            href="{{ route('admin.procesos.index') }}">
                            <span>
                                <i class="ni ni-delivery-fast text-primary"></i>
                                <span class="nav-link-text">Procesos</span>
                            </span>
                            @if (\App\Models\Pedido::where('status', 'EN PROCESO')->count())
                                <span class="badge badge-success">
                                    {{ \App\Models\Pedido::where('status', 'EN PROCESO')->count() }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.ventas.*') ? 'active' : '' }}"
                            href="{{ route('admin.ventas.index') }}">
                            <i class="ni ni-credit-card text-default"></i>
                            <span class="nav-link-text">Ventas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        @can('users_index')
                            <a class="nav-link  {{ Route::is('admin.users.index') ? 'active' : '' }}"
                                href="{{ route('admin.users.index') }} ">
                                <i class="ni ni-single-02 text-orange"></i>
                                <span class="nav-link-text">Usuarios</span>
                            </a>
                        </li>
                    @endcan
                    @can('roles_index')
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.roles.index') ? 'active' : '' }}"
                                href="{{ route('admin.roles.index') }} ">
                                <i class="ni ni-single-copy-04 text-info"></i>
                                <span class="nav-link-text">Roles</span>
                            </a>
                        </li>
                    @endcan
                    @can('providers_index')
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.providers.index') ? 'active' : '' }}"
                                href="{{ route('admin.providers.index') }} ">
                                <i class="ni ni-single-copy-04 text-info"></i>
                                <span class="nav-link-text">Proveedores</span>
                            </a>
                        </li>
                    @endcan
                    @can('profiles_index')
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.clients.index') ? 'active' : '' }}"
                                href="{{ route('admin.clients.index') }} ">
                                <i class="ni ni-single-copy-04 text-info"></i>
                                <span class="nav-link-text">Clientes</span>
                            </a>
                        </li>
                    @endcan
                    @can('categories_index')
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.categories.index') ? 'active' : '' }}"
                                href="{{ route('admin.categories.index') }} ">
                                <i class="ni ni-ungroup text-danger"></i>
                                <span class="nav-link-text">Categorias</span>
                            </a>
                        </li>
                    @endcan
                    @can('products_index')
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.products.index') ? 'active' : '' }}"
                                href="{{ route('admin.products.index') }} ">
                                <i class="ni ni-box-2 text-success"></i>
                                <span class="nav-link-text">Productos</span>
                            </a>
                        </li>
                    @endcan
                    @if (Auth::user()->hasRole('Secre'))
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.pedidos.index') ? 'active' : '' }}"
                                href="{{ route('admin.pedidos.index') }} ">
                                <i class="ni ni-box-2 text-danger"></i>
                                <span class="nav-link-text">Pedidos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.procesos.index') ? 'active' : '' }}"
                                href="{{ route('admin.procesos.index') }} ">
                                <i class="ni ni-box-2 text-primary"></i>
                                <span class="nav-link-text">En proceso</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.ventas.index') ? 'active' : '' }}"
                                href="{{ route('admin.ventas.index') }} ">
                                <i class="ni ni-box-2 text-success"></i>
                                <span class="nav-link-text">Ventas</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.drivers.*') ? 'active' : '' }}"
                            href="{{ route('admin.drivers.index') }}">
                            <i class="ni ni-delivery-fast text-primary"></i>
                            <span class="nav-link-text">Choferes</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
