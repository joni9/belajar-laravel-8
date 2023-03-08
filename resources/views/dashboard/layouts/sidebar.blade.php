
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <span data-feather="file-text" class="align-text-bottom"></span>
          My Posts
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/slidder*') ? 'active' : '' }}" href="/dashboard/slidder">
          <span data-feather="file-text" class="align-text-bottom"></span>
          The Slidder
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/info*') ? 'active' : '' }}" href="/dashboard/info">
          <span data-feather="file-text" class="align-text-bottom"></span>
          The Info
        </a>
      </li>
    </ul>
    @can('Admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      Administrator
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid" class="align-text-bottom"></span>
          Posts Category
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/partner*') ? 'active' : '' }}" href="/dashboard/partner">
          <span data-feather="grid" class="align-text-bottom"></span>
          The Partner
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/dosen*') ? 'active' : '' }}" href="/dashboard/dosen">
          <span data-feather="grid" class="align-text-bottom"></span>
          The Dosen
        </a>
      </li>
    </ul> 
    @endcan
  {{-- halaman hanya bisa diakses oleh gerbang/gates di Admin --}}

    
  </div>
</nav>