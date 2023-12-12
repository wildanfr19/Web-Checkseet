<!DOCTYPE html>
<html lang="en">
<head>
 @include('layouts.head')
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
       @include('layouts.navbar_header')
       @include('layouts._sidebar-left')
       {{-- @include('layouts._menu-sc-user') --}}

      <!-- Main Content -->
      <div class="main-content">
           @include('layouts.section_content')
      </div>
      @include('layouts.footer')
    </div>
  </div>
  <!-- General JS Scripts -->
  @include('layouts.script')
</body>
</html>