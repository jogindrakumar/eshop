<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="" class="simple-text logo-normal">
        E-shop
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active': '' }} ">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <li class="nav-item {{ Request::is('categories') ? 'active': '' }}">
          <a class="nav-link" href="{{ route('category') }}">
            <i class="fas fa-grip-lines"></i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('add-category') ? 'active': '' }}">
          <a class="nav-link" href="{{ route('add-category') }}">
            <i class="fas fa-plus"></i>
            <p>Add Category</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('product') ? 'active': '' }}">
          <a class="nav-link" href="{{ route('product') }}">
            <i class="fas fa-shopping-basket"></i>
            <p>Product</p>
          </a>
        
        </li>
        <li class="nav-item {{ Request::is('product-add') ? 'active': '' }}">
          <a class="nav-link" href="{{ route('product-add') }}">
            <i class="fas fa-plus"></i>
            <p>ADD Product</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./tables.html">
            <i class="material-icons">content_paste</i>
            <p>Table List</p>
          </a>
        </li>
        
      </ul>
    </div>
  </div>