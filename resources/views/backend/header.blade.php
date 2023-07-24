<div class="home-header">
    <div class="row w-100 justify-content-between align-items-center">
      <div class="col-auto d-flex">
        <div class="sidebar_menu_icon">
          <div class="menuList">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="15"
              height="12"
              viewBox="0 0 15 12"
            >
              <path
                id="Union_5"
                data-name="Union 5"
                d="M-2188.5,52.5v-2h15v2Zm0-5v-2h15v2Zm0-5v-2h15v2Z"
                transform="translate(2188.5 -40.5)"
                fill="#6e6f78"
              />
            </svg>
          </div>
        </div>
        <div class=" ms-4">
          <a href="{{ route('timeline') }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="{{get_phrase('Visit Website')}}"><i class="bi bi-globe d-inline-block d-md-none"></i> <span class="d-md-inline-block d-none">{{get_phrase('Visit Website')}}</span></a>
        </div>
      </div>
      <div class="col-auto d-xl-block d-none">
        
      </div>
      <div class="col-auto">
        <div class="header-menu">
          <ul>
            <li class="user-profile pe-2">
              <select class="form-control text-capitalize text-13px py-1 me-2" onchange="$(location).attr('href','<?php echo route('language.switch', ''); ?>/'+$(this).val());" style="margin-top: 7px;">
                @foreach(get_all_language() as $language)
                  <option value="{{$language->name}}" @if($language->name == Session('active_language')) selected @endif>{{$language->name}}</option>
                @endforeach
              </select>
            </li>
              <li class="user-profile">
              <div class="btn-group">
                <button
                  class="btn btn-secondary dropdown-toggle"
                  type="button"
                  id="defaultDropdown"
                  data-bs-toggle="dropdown"
                  data-bs-auto-close="true"
                  aria-expanded="false"
                >
                  <div class="">
                    <img src="{{ get_user_image(auth()->user()->photo,'optimized') }}" height="42px" />
                  </div>
                  <div class="px-2 text-start">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <span class="user-title">{{ auth()->user()->user_role }}</span>
                  </div>
                </button>
                <ul
                  class="dropdown-menu dropdown-menu-end eDropdown-menu"
                  aria-labelledby="defaultDropdown"
                >
                  <li class="user-profile user-profile-inner">
                    <button
                      class="btn w-100 d-flex align-items-center"
                      type="button"
                    >
                      <div class="">
                        <img
                          class="radious-5px"
                          src="{{ get_user_image(auth()->user()->photo,'optimized') }}"
                          height="42px"
                        />
                      </div>
                      <div class="px-2 text-start">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-title">{{ auth()->user()->user_role }}</span>
                      </div>
                    </button>
                  </li>
                  
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13.275" height="14.944" viewBox="0 0 13.275 14.944">
                          <g id="user_icon" data-name="user icon" transform="translate(-1368.531 -147.15)">
                            <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(1370.609 147.15)" fill="none" stroke="#181c32" stroke-width="2">
                              <ellipse cx="4.576" cy="4.435" rx="4.576" ry="4.435" stroke="none"></ellipse>
                              <ellipse cx="4.576" cy="4.435" rx="3.576" ry="3.435" fill="none"></ellipse>
                            </g>
                            <path id="Path_41" data-name="Path 41" d="M1485.186,311.087a5.818,5.818,0,0,1,5.856-4.283,5.534,5.534,0,0,1,5.466,4.283" transform="translate(-115.686 -149.241)" fill="none" stroke="#181c32" stroke-width="2"></path>
                          </g>
                        </svg>
                      </span>
                      {{get_phrase('My Account')}}
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="{{ route('admin.change.password') }}">
                      <span>
                        <svg id="Layer_1" width="13.275" height="14.944" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m6.5 16a1.5 1.5 0 1 1 -1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm3 7.861a7.939 7.939 0 0 0 6.065-5.261 7.8 7.8 0 0 0 .32-3.85l.681-.689a1.5 1.5 0 0 0 .434-1.061v-2h.5a2.5 2.5 0 0 0 2.5-2.5v-.5h1.251a2.512 2.512 0 0 0 2.307-1.52 5.323 5.323 0 0 0 .416-2.635 4.317 4.317 0 0 0 -4.345-3.845 5.467 5.467 0 0 0 -3.891 1.612l-6.5 6.5a7.776 7.776 0 0 0 -3.84.326 8 8 0 0 0 2.627 15.562 8.131 8.131 0 0 0 1.475-.139zm-.185-12.661a1.5 1.5 0 0 0 1.463-.385l7.081-7.08a2.487 2.487 0 0 1 1.77-.735 1.342 1.342 0 0 1 1.36 1.149 2.2 2.2 0 0 1 -.08.851h-1.409a2.5 2.5 0 0 0 -2.5 2.5v.5h-.5a2.5 2.5 0 0 0 -2.5 2.5v1.884l-.822.831a1.5 1.5 0 0 0 -.378 1.459 4.923 4.923 0 0 1 -.074 2.955 5 5 0 1 1 -6.36-6.352 4.9 4.9 0 0 1 1.592-.268 5.053 5.053 0 0 1 1.357.191z"></path></svg>
                      </span>
                      {{get_phrase('Change Password')}}
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="{{ route('admin.system.settings.view') }}">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="13.275" height="14.944">
                          <g>
                            <path d="M256,162.923c-51.405,0-93.077,41.672-93.077,93.077s41.672,93.077,93.077,93.077s93.077-41.672,93.077-93.077   C349.019,204.619,307.381,162.981,256,162.923z M256,285.077c-16.059,0-29.077-13.018-29.077-29.077s13.018-29.077,29.077-29.077   c16.059,0,29.077,13.018,29.077,29.077l0,0C285.066,272.054,272.054,285.066,256,285.077z"></path>
                            <path d="M469.333,256c-0.032-32.689-7.633-64.927-22.208-94.187l10.965-7.616c14.496-10.104,18.058-30.046,7.957-44.544l0,0   c-10.104-14.496-30.046-18.058-44.544-7.957l-10.987,7.637c-32.574-34.38-75.691-56.904-122.517-64V32c0-17.673-14.327-32-32-32   l0,0c-17.673,0-32,14.327-32,32v13.333c-46.826,7.096-89.944,29.62-122.517,64l-10.987-7.637   c-14.498-10.101-34.44-6.538-44.544,7.957l0,0c-10.101,14.498-6.538,34.44,7.957,44.544l10.965,7.616   c-29.61,59.3-29.61,129.073,0,188.373l-10.965,7.616c-14.496,10.104-18.058,30.046-7.957,44.544l0,0   c10.104,14.496,30.046,18.058,44.544,7.957l10.987-7.637c32.574,34.38,75.691,56.904,122.517,64V480c0,17.673,14.327,32,32,32l0,0   c17.673,0,32-14.327,32-32v-13.333c46.826-7.096,89.944-29.62,122.517-64l10.987,7.637c14.498,10.101,34.44,6.538,44.544-7.957l0,0   c10.101-14.498,6.538-34.44-7.957-44.544l-10.965-7.616C461.7,320.927,469.301,288.689,469.333,256z M256,405.333   c-82.475,0-149.333-66.859-149.333-149.333S173.525,106.667,256,106.667S405.333,173.525,405.333,256   C405.228,338.431,338.431,405.228,256,405.333z"></path>
                          </g>
                          </svg>
                      </span>
                      {{get_phrase('Settings')}}
                    </a>
                  </li>
                  
                  
                  <!-- Logout Button -->
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="btn eLogut_btn" type="submit"> 
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.046" height="12.29" viewBox="0 0 14.046 12.29">
                            <path id="Logout" d="M4.389,42.535H2.634a.878.878,0,0,1-.878-.878V34.634a.878.878,0,0,1,.878-.878H4.389a.878.878,0,0,0,0-1.756H2.634A2.634,2.634,0,0,0,0,34.634v7.023A2.634,2.634,0,0,0,2.634,44.29H4.389a.878.878,0,1,0,0-1.756Zm9.4-5.009-3.512-3.512a.878.878,0,0,0-1.241,1.241l2.015,2.012H5.267a.878.878,0,0,0,0,1.756H11.05L9.037,41.036a.878.878,0,1,0,1.241,1.241l3.512-3.512A.879.879,0,0,0,13.788,37.525Z" transform="translate(0 -32)" fill="#fff"></path>
                          </svg>
                        </span>  
                        {{get_phrase('Log out')}}
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>