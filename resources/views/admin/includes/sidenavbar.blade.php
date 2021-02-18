  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{imageFile(config('setting.logo.path').'/logo.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.categories') }}" href="{{ route('admin.categories')}}">
                <i class="ni ni-chart-pie-35 text-primary"></i>
                <span class="nav-link-text">Manage Category</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.items') }}" href="{{ route('admin.items')}}">

                <i class="fas fa-sitemap text-success"></i>
                <span class="nav-link-text">Manage Items</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.type') }}" href="{{ route('admin.type')}}">

                <i class="fab fa-accusoft text-warning"></i>
                <span class="nav-link-text">Item Types</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.package') }}" href="{{ route('admin.package')}}">
                <i class="fas fa-box text-info"></i>
                <span class="nav-link-text">Item Packages</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.giftcard') }}" href="{{ route('admin.giftcard')}}">
                <i class="fas fa-gifts text-danger"></i>
                <span class="nav-link-text">Gift Cards</span>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ activeLink('admin.subscription') }}" href="{{ route('admin.subscription')}}">
                  <i class="ni ni-planet text-orange"></i>
                  <span class="nav-link-text">Subscriptions</span>
                </a>
              </li>


              <li class="nav-item">
                <a class="nav-link collapsed" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="ni ni-ungroup text-orange"></i>
                  <span class="nav-link-text">Payment Gateways</span>
                </a>
                <div class="collapse" id="navbar-examples" style="">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{route('admin.gateway.automatic.index')}}" class="nav-link {{activeLink('admin.gateway.automatic.index')}}">
                        <span class="sidenav-mini-icon"><i class="fas fa-money"></i></span>
                        <span class="sidenav-normal"> Automatic Gateways </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('admin.gateway.manual.index')}}" class="nav-link {{activeLink('admin.gateway.manual.index')}}">
                        <span class="sidenav-mini-icon"></span>
                        <span class="sidenav-normal"> Manual Gateways </span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>





          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Front End Manage</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.banners') }}" href="{{ route('admin.banners') }}">
                <i class="ni ni-album-2"></i>
                <span class="nav-link-text">Banner</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ activeLink('admin.setting') }}" href="{{ route('admin.setting') }}">
                <i class="fas fa-cog"></i>
                <span class="nav-link-text">Setting</span>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="ni ni-ungroup text-orange"></i>
                  <span class="nav-link-text">Examples</span>
                </a>
                <div class="collapse" id="navbar-examples" style="">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="../../pages/examples/pricing.html" class="nav-link">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal"> Pricing </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/login.html" class="nav-link">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Login </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/register.html" class="nav-link">
                        <span class="sidenav-mini-icon"> R </span>
                        <span class="sidenav-normal"> Register </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/lock.html" class="nav-link">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Lock </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/timeline.html" class="nav-link">
                        <span class="sidenav-mini-icon"> T </span>
                        <span class="sidenav-normal"> Timeline </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/profile.html" class="nav-link">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal"> Profile </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/examples/rtl-support.html" class="nav-link">
                        <span class="sidenav-mini-icon"> RP </span>
                        <span class="sidenav-normal"> RTL Support </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>



          </ul>
        </div>
      </div>
    </div>
  </nav>
