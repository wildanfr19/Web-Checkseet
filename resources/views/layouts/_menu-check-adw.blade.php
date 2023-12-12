    @permission('manage-index-checkseet')
    <li class="{{ route('checkseet.index') == request()->url() ? 'active' : '' }}">
      <a href="{{route('checkseet.index')}}" class="nav-link"><i class="fas fa-file"></i><span>CheckSeet</span></a>
    </li>
    @endpermission
