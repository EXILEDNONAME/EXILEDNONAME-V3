<div id="kt_header" class="header header-fixed">
  <div class="container-fluid d-flex align-items-stretch justify-content-between">

    <!-- HEADER MENU LEFT -->
    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
      <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
        <ul class="menu-nav">
          <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="menu-text">Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
              <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true">
                  <a href="index.html" class="menu-link">
                    <span class="svg-icon menu-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24" />
                          <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000" />
                          <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        </g>
                      </svg>
                    </span>
                    <span class="menu-text">My Account</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- HEADER MENU RIGHT -->
    <div class="topbar">
      @include('includes.components.header-menu-right.search')
      @include('includes.components.header-menu-right.notifications')
      @include('includes.components.header-menu-right.quick-action')
      @include('includes.components.header-menu-right.cart')
      @include('includes.components.header-menu-right.quick-panel')
      @include('includes.components.header-menu-right.chat')
      @include('includes.components.header-menu-right.languages')
      @include('includes.components.header-menu-right.user')
    </div>

  </div>
</div>