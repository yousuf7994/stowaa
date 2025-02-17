<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')-{{ config('app.name') }}</title>

  <!-- Prevent the demo from appearing in search engines -->
  <meta name="robots" content="noindex">

  <!-- Perfect Scrollbar -->
  <link type="text/css" href="{{ asset('backend/css/perfect-scrollbar.css') }}" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="{{ asset('backend/css/app.css') }}" rel="stylesheet">

  <!-- Material Design Icons -->
  <link type="text/css" href="{{ asset('backend/css/vendor-material-icons.css') }}" rel="stylesheet">

  <!-- Font Awesome FREE Icons -->
  <link type="text/css" href="{{ asset('backend/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css">

  @yield('style')
</head>

<body class="layout-default">

  <div class="preloader"></div>

  <!-- Header Layout -->
  <div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->

    <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
      <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
          <div class="container-fluid p-0">

            <!-- Navbar toggler -->

            <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button" data-toggle="sidebar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Brand -->
            <a href="index.html" class="navbar-brand ">

              <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="width:20px;"
                viewBox="0 0 40 40">
                <path
                  d="M40 34.16666667c.01-3.21166667-2.58333333-5.82333334-5.795-5.835-1.94-.00666667-3.75666667.955-4.84166667 2.565-.10166666.155-.295.22333333-.47166666.16666666L11.94 25.66666667c-.19-.06-.31-.245-.28833333-.44333334.01-.07333333.015-.14833333.015-.22333333 0-.06833333-.005-.13833333-.01333334-.20666667-.02166666-.20166666.105-.39.3-.44666666l17.96-5.13c.13833334-.04.28666667-.005.39333334.09166666 1.05.97333334 2.42833333 1.51666667 3.86 1.525C37.38833333 20.83333333 40 18.22166667 40 15s-2.61166667-5.83333333-5.83333333-5.83333333C32.52 9.17166667 30.95333333 9.87833333 29.86 11.11c-.11.12166667-.28.16833333-.43666667.11833333L11.91 5.65333333c-.16-.05-.27333333-.19166666-.28833333-.35833333-.30333334-3.20166667-3.14333334-5.55166667-6.345-5.24833333S-.275 3.19.02833333 6.39166667c.28166667 2.99333333 2.79833334 5.28 5.805 5.275 1.64666667-.005 3.21333334-.71333334 4.30666667-1.945.11-.12166667.28-.16833334.43666667-.11833334l16.57 5.27166667c.22.06833333.34166666.30333333.27166666.52333333-.04166666.13333334-.14833333.23833334-.28333333.275L9.90333333 20.59666667c-.13333333.03833333-.275.00833333-.38166666-.08-1.03333334-.86833334-2.33833334-1.34666667-3.68833334-1.35C2.61166667 19.16666667 0 21.77833333 0 25s2.61166667 5.83333333 5.83333333 5.83333333c1.355-.005 2.665-.485 3.7-1.35833333.10833334-.09166667.25833334-.12.39333334-.07666667l18.29 5.81833334c.14.04333333.24666666.15666666.28.3.75666666 3.13166666 3.90833333 5.05666666 7.04 4.3C38.14833333 39.185 39.99 36.85333333 40 34.16666667z" />
              </svg>

              <span>flowdash</span>
            </a>

            <form class="search-form d-none d-sm-flex flex" action="index.html">
              <button class="btn" type="submit"><i class="material-icons">search</i></button>
              <input type="text" class="form-control" placeholder="Search">
            </form>

            <ul class="nav navbar-nav ml-auto d-none d-md-flex">
              <li class="nav-item dropdown">
                <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown"
                  data-caret="false">
                  <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                </a>
                <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                  <div class="dropdown-item d-flex align-items-center py-2">
                    <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                    <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                  </div>
                  <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
                    <div class="py-2">

                      <div class="dropdown-item d-flex">
                        <div class="mr-3">
                          <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar"
                              class="avatar-img rounded-circle">
                          </div>
                        </div>
                        <div class="flex">
                          <a href="">A.Demian</a> left a comment on <a href="">FlowDash</a><br>
                          <small class="text-muted">1 minute ago</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View
                    All</a>
                </div>
              </li>
            </ul>

            <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
              <li class="nav-item dropdown">
                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                  <span class="mr-1 d-flex-inline">
                    <span class="text-light">{{ auth()->user()->name }}</span>
                  </span>
                  <img src="{{ Avatar::create(auth()->user()->name)->setDimension(40)->setFontSize(16)->toBase64() }}"
                    alt="">
                  {{-- <img src="assets/images/avatar/demi.png" class="rounded-circle" width="32" alt="Frontted"> --}}
                </a>
                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-item-text dropdown-item-text--lh">
                    <div><strong>{{ auth()->user()->name }}</strong></div>
                    <div class="text-muted">{{ auth()->user()->email }}</div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item active" href="index.html"><i class="material-icons">dvr</i> Dashboard</a>
                  <a class="dropdown-item" href="profile.html"><i class="material-icons">account_circle</i> My
                    profile</a>
                  <a class="dropdown-item" href="edit-account.html"><i class="material-icons">edit</i> Edit
                    account</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                </div>
              </li>
            </ul>

          </div>
        </div>

      </div>
    </div>

    <!-- // END Header -->

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

      <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
          @yield('content')
        </div>
        <!-- // END drawer-layout__content -->

        <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
          <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
              <div class="sidebar-heading">Menu</div>
              <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ Route::is('backend.*') ? 'active' : '' }}">
                  <a class="sidebar-menu-button {{ Route::is('backend.*') ? 'active' : '' }}"
                    href="{{ route('backend.home') }}">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                    <span class="sidebar-menu-text">Dashboards</span>
                  </a>
                </li>
                
                  @role('super-admin|admin')
                  <li class="sidebar-menu-item {{ Route::is('backend.order.*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('backend.order.index') }}">
                      <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                      <span class="sidebar-menu-text">Order</span>
                    </a>
                  </li>
                  <li
                    class="sidebar-menu-item {{ Route::is(['backend.product.*', 'backend.category.*', 'backend.color.*', 'backend.size.*']) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#category_menu">
                      <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                      <span class="sidebar-menu-text">Products</span>
                      <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="category_menu">
                      <li class="sidebar-menu-item {{ Route::is('backend.product.create') ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="{{ route('backend.product.create') }}">
                          <span class="sidebar-menu-text">Add Product</span>
                        </a>
                      </li>
                      <li class="sidebar-menu-item {{ Route::is('backend.product.index') ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="{{ route('backend.product.index') }}">
                          <span class="sidebar-menu-text">All Products</span>
                        </a>
                      </li>
                      <li class="sidebar-menu-item {{ Route::is('backend.category.index') ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="{{ route('backend.category.index') }}">
                          <span class="sidebar-menu-text">Product Category</span>
                        </a>
                      </li>
                      <li class="sidebar-menu-item {{ Route::is('backend.color.index') ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="{{ route('backend.color.index') }}">
                          <span class="sidebar-menu-text">Product Color</span>
                        </a>
                      </li>
                      <li class="sidebar-menu-item {{ Route::is('backend.size.index') ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="{{ route('backend.size.index') }}">
                          <span class="sidebar-menu-text">Product Size</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                   <li class="sidebar-menu-item {{ Route::is('backend.user*') ? 'active open' : '' }}">
                      <a class="sidebar-menu-button" data-toggle="collapse" href="#user_menu">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                        <span class="sidebar-menu-text">Users</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                      </a>
                      <ul class="sidebar-submenu collapse" id="user_menu">
                          <li class="sidebar-menu-item {{ Route::is('backend.user.index') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.user.index') }}">
                              <span class="sidebar-menu-text">All Users</span>
                            </a>
                          </li>
                          <li class="sidebar-menu-item {{ Route::is('backend.user.create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.user.create') }}">
                              <span class="sidebar-menu-text">Create User</span>
                            </a>
                          </li>
                      </ul>
                    </li>

                  @canany(['see role', 'create role'])
                    <li class="sidebar-menu-item {{ Route::is('backend.role*') ? 'active open' : '' }}">
                      <a class="sidebar-menu-button" data-toggle="collapse" href="#role_menu">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                        <span class="sidebar-menu-text">Role & Permision</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                      </a>
                      <ul class="sidebar-submenu collapse" id="role_menu">
                        @can('see role')
                          <li class="sidebar-menu-item {{ Route::is('backend.role.index') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.role.index') }}">
                              <span class="sidebar-menu-text">All Roles</span>
                            </a>
                          </li>
                        @endcan
                        @can('create role')
                          <li class="sidebar-menu-item {{ Route::is('backend.role.create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.role.create') }}">
                              <span class="sidebar-menu-text">Create Role</span>
                            </a>
                          </li>
                        @endcan
                      </ul>
                    </li>                   
                  @endcanany

                  <li class="sidebar-menu-item {{ Route::is('backend.coupon.*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('backend.coupon.index') }}">
                      <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                      <span class="sidebar-menu-text">Coupon</span>
                    </a>
                  </li>
                  <li class="sidebar-menu-item {{ Route::is('backend.shippingcharge.*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('backend.shippingcharge.index') }}">
                      <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                      <span class="sidebar-menu-text">Shipping Charge</span>
                    </a>
                  </li>
                  <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#apps_menu">
                      <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                      <span class="sidebar-menu-text">Apps</span>
                      <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="apps_menu">
                      <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="app-activities.html">
                          <span class="sidebar-menu-text">Activities</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  @endrole
                
              </ul>

              <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="#" class="flex d-flex align-items-center text-underline-0 text-body">
                  <span class="avatar avatar-sm mr-2">
                    {{-- <img src="assets/images/avatar/demi.png" alt="avatar" class="avatar-img rounded-circle"> --}}
                    <img
                      src="{{ Avatar::create(auth()->user()->name)->setDimension(40)->setFontSize(16)->toBase64() }}"
                      alt="">
                  </span>
                  <span class="flex d-flex flex-column">
                    <strong>{{ auth()->user()->name }}</strong>
                    <small class="text-muted text-uppercase">
                      @foreach (auth()->user()->roles as $role)
                        {{ $role->name }}
                      @endforeach
                    </small>
                  </span>
                </a>
                <div class="dropdown ml-auto">
                  <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i
                      class="material-icons">more_vert</i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-item-text dropdown-item-text--lh">
                      <div><strong>{{ auth()->user()->name }}</strong></div>
                      <div>{{ auth()->user()->email }}</div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item active" href="index.html">Dashboard</a>
                    <a class="dropdown-item" href="profile.html">My profile</a>
                    <a class="dropdown-item" href="edit-account.html">Edit account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- // END drawer-layout -->

    </div>
    <!-- // END header-layout__content -->

  </div>
  <!-- // END header-layout -->

  <!-- App Settings FAB -->
  <div id="app-settings">
    <app-settings layout-active="default"
      :layout-location="{
          'default': 'index.html',
          'fixed': 'fixed-dashboard.html',
          'fluid': 'fluid-dashboard.html',
          'mini': 'mini-dashboard.html'
      }">
    </app-settings>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('backend/js/popper.min.js') }}"></script>
  <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

  <!-- Perfect Scrollbar -->
  <script src="{{ asset('backend/js/perfect-scrollbar.min.js') }}"></script>

  <!-- DOM Factory -->
  <script src="{{ asset('backend/js/dom-factory.js') }}"></script>

  <!-- MDK -->
  <script src="{{ asset('backend/js/material-design-kit.js') }}"></script>

  <!-- App -->
  <script src="{{ asset('backend/js/toggle-check-all.js') }}"></script>
  <script src="{{ asset('backend/js/check-selected-row.js') }}"></script>
  <script src="{{ asset('backend/js/dropdown.js') }}"></script>
  <script src="{{ asset('backend/js/sidebar-mini.js') }}"></script>
  <script src="{{ asset('backend/js/app.js') }}"></script>

  <!-- App Settings (safe to remove) -->
  <script src="{{ asset('backend/js/app-settings.js') }}"></script>

  <!-- Flatpickr -->
  <script src="{{ asset('backend/js/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('backend/js/flatpickr.js') }}"></script>

  <!-- Global Settings -->
  <script src="{{ asset('backend/js/settings.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.all.js"></script>

  @yield('script')

  @include('flashmessage')
</body>

</html>
