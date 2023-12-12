
<li class="dropdown">
    @permission('manage-item')
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Price</span></a>
    @endpermission
    <ul class="dropdown-menu" style="display: none;">
        @permission('manage-item')
        <li class="{{ route('item.index') == request()->url() ? 'active' : '' }}">
        <a href="{{ route('item.index') }}" class="nav-link"><span>Product Item</span></a>
        </li>
        @endpermission
        
        @permission('manage-category')
        <li class="{{ route('category.index') == request()->url() ? 'active' : '' }}">
        <a href="{{ route('category.index') }}" class="nav-link"><span>Category Item</span></a>
        </li>
        @endpermission
    </ul>
  </li>


@permission('manage-user|manage-module|manage-role|manage-permission')
<li class="menu-header">Setting</li>
@endpermission

<li class="dropdown">
 @permission('manage-user|manage-module|manage-role|manage-permission')
 <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-check-circle"></i> <span>Authorization</span></a>
 @endpermission

 <ul class="dropdown-menu">
  @permission('manage-user')
  <li><a class="nav-link" href="{{ route('user.index') }}">{{-- <i class="fas fa-user"></i> --}} User Management</a></li>
  @endpermission

  @permission('manage-module')
  <li><a class="nav-link" href="{{route('module.index')}}">Module</a></li> 
  @endpermission 

  @permission('manage-permission')
  <li><a class="nav-link" href="{{ route('permission.index') }}">{{-- <i class="fas fa-user-lock"></i> --}} Permission</a></li>
  @endpermission


  @permission('manage-role')
  <li><a class="nav-link" href="{{ route('role.index') }}">{{-- <i class="fas fa-user-check"></i> --}} Role</a></li>
  @endpermission


