    @permission('manage-order-notification')
    <li class="{{ route('order.listpch') == request()->url() ? 'active' : '' }}">
      <a href="{{ route('order.listpch') }}" class="nav-link"><i class="fas fa-shopping-cart" aria-hidden="true"></i><span>Ordering</span></a>
    </li>
    @endpermission
