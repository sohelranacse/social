<div class="sidebar">
      <div class="logo-details mt-4">
        <div class="img_wrapper">
          @php
          $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description');
          $system_fav_icon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
          @endphp
          <img class="logo-lg" height="34px" src="{{ get_system_logo_favicon($system_light_logo,'light') }}" alt="" />
          <img class="logo-sm" height="34px" src="{{ get_system_logo_favicon($system_fav_icon,'favicon') }}" alt="" />
        </div>
      </div>
      <div class="closeIcon">
        <span><i class="fas fa-close"></i></span>
      </div>
      <ul class="nav-links">
        <!-- sidebar title -->
        <li class="nav-links-li">
          <div class="iocn-link">
            <a href="{{ route('user.dashboard') }}">
              <div class="sidebar_icon">
                <i class="fa-solid fa-house-user"></i>
              </div>
              <span class="link_name custom_dashboard_color">{{ get_phrase('Dashboard') }} </span>
            </a>
          </div>
        </li>
        <!-- Sidebar menu -->


        <li class="nav-links-li  @if(Route::currentRouteName()=='user.ads' || Route::currentRouteName()=='user.ad.create' || Route::currentRouteName()=='user.ad.edit')showMenu @endif">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-rectangle-ad"></i>
              </div>
              <span class="link_name">{{ get_phrase('Ads') }}</span>
            </a>
            <span class="arrow">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="4.743"
                height="7.773"
                viewBox="0 0 4.743 7.773"
              >
                <path
                  id="navigate_before_FILL0_wght600_GRAD0_opsz24"
                  d="M1.466.247,4.5,3.277a.793.793,0,0,1,.189.288.92.92,0,0,1,0,.643A.793.793,0,0,1,4.5,4.5l-3.03,3.03a.828.828,0,0,1-.609.247.828.828,0,0,1-.609-.247.875.875,0,0,1,0-1.219L2.668,3.886.247,1.466A.828.828,0,0,1,0,.856.828.828,0,0,1,.247.247.828.828,0,0,1,.856,0,.828.828,0,0,1,1.466.247Z"
                  fill="#fff"
                  opacity="1"
                />
              </svg>
            </span>
          </div>
          <ul class="sub-menu">
            <li><a class="@if(Route::currentRouteName()=='user.ads')Active @endif" href="{{ route('user.ads') }}">{{ get_phrase('Ad List') }}</a></li>
            <li><a class="@if(Route::currentRouteName()=='user.ad.create')Active @endif" href="{{ route('user.ad.create') }}">{{ get_phrase('Create Ad') }}</a></li>
          </ul>
        </li>

        <!-- menu starts here -->
        <li class="nav-links-li @if(Route::currentRouteName() == 'user.payment_histories') showMenu @endif">
          <div class="iocn-link">
            <a class="w-100" href="{{ route('user.payment_histories') }}">
              <div class="sidebar_icon">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              <span class="link_name">
                {{ get_phrase('Payment history') }}
              </span>
            </a>
          </div>
        </li>

      </ul>
    </div>