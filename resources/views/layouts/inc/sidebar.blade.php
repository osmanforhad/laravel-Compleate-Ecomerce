<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
            E-Shop
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('category.show') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('category.show') }}">
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('category.create') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('category.create') }}">
                    <p>Add Category</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('product.show') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('product.show') }}">
                    <p>Product</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('product.create') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('product.create') }}">
                    <p>Add Product</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('orders.list') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('orders.list') }}">
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('registered.users') ? 'active':'' }}">
                <a class="nav-link" href="{{ route('registered.users') }}">
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>
