<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <h3 class="text-warning">{{ config('app.name', 'Laravel') }}</h3>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }} ">
              <i class="ni ni-single-02 text-orange"></i>
              <span class="nav-link-text">Usuarios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.roles.index') }} ">
              <i class="ni ni-single-copy-04 text-info"></i>
              <span class="nav-link-text">Roles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index') }} ">
              <i class="ni ni-ungroup text-danger"></i>
              <span class="nav-link-text">Categorias</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products.index') }} ">
              <i class="ni ni-box-2 text-success"></i>
              <span class="nav-link-text">Productos</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>