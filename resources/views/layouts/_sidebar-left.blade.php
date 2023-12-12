<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">WEB CHECKSEET </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      {{-- @permission('manage-user|manage-module|manage-role|manage-permission') --}}
      <li class="menu-header">Dashboard</li>
      <li class="{{ route('home') == request()->url() ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
      </li>
        @include('layouts._menu-dep-head')
        @include('layouts._menu-check-adw')
        @include('layouts._menu-admin')
     

      </ul>
    </li>

  </ul>
</div>