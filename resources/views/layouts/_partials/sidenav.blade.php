<nav class="nav flex-column">
    <a class="nav-link border-right"></a>
    <a class="nav-link {{ strpos(Route::currentRouteName(), 'dashboard') !== false ? 'border border-right-0 text-muted' : 'border-right'}}"
        href="{{ route('dashboard.index') }}">
        <i class="mr-1 fas fa-tachometer-alt"></i> Dashboard
    </a>
    <a class="nav-link {{ strpos(Route::currentRouteName(), 'brand') !== false ? 'border border-right-0 text-muted' : 'border-right'}}" 
        href="{{ route('brand.index') }}">
        <i class="mr-1 fas fa-tags"></i> Brands
    </a>
    <a class="nav-link {{ strpos(Route::currentRouteName(), 'category') !== false ? 'border border-right-0 text-muted' : 'border-right'}}" 
        href="{{ route('category.index') }}">
        <i class="mr-1 fas fa-archive"></i> Categories
    </a>
    <a class="nav-link {{ strpos(Route::currentRouteName(), 'product') !== false ? 'border border-right-0 text-muted' : 'border-right'}}" 
        href="{{ route('product.index') }}">
        <i class="mr-1 fas fa-box-open"></i> Products
    </a>
    <a class="nav-link {{ strpos(Route::currentRouteName(), 'order') !== false ? 'border border-right-0 text-muted' : 'border-right'}}" 
        href="{{ route('order.index') }}">
        <i class="mr-1 fas fa-shopping-cart"></i> Order
    </a>
    <a class="nav-link border-right"></a>
</nav>
