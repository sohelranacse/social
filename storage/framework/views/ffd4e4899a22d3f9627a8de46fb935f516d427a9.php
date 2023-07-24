<div class="sidebar">
      <div class="logo-details mt-4">
        <div class="img_wrapper">
          <?php
          $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description');
          $system_fav_icon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
          ?>
          <img class="logo-lg" height="34px" src="<?php echo e(get_system_logo_favicon($system_light_logo,'light')); ?>" alt="" />
          <img class="logo-sm" height="34px" src="<?php echo e(get_system_logo_favicon($system_fav_icon,'favicon')); ?>" alt="" />
        </div>
      </div>
      <div class="closeIcon">
        <span><i class="fas fa-close"></i></span>
      </div>
      <ul class="nav-links">
        <!-- sidebar title -->
        <li class="nav-links-li">
          <div class="iocn-link">
            <a href="<?php echo e(route('admin.dashboard')); ?>">
              <div class="sidebar_icon">
                <i class="fa-solid fa-house-user"></i>
              </div>
              <span class="link_name custom_dashboard_color"><?php echo e(get_phrase('Dashboard')); ?> </span>
            </a>
          </div>
        </li>
        <!-- Sidebar menu -->

        <!-- Sidebar menu -->
        <li class="nav-links-li <?php if(Route::currentRouteName()=='admin.view.category' || Route::currentRouteName()=='admin.users' || Route::currentRouteName()=='admin.user.add' || Route::currentRouteName()=='admin.user.edit'): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <span class="link_name"><?php echo e(get_phrase('User')); ?> </span>
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
            <li><a  class="<?php if(Route::currentRouteName()=='admin.users'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.users')); ?>"><?php echo e(get_phrase('Users')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.user.add'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.user.add')); ?>"><?php echo e(get_phrase('Create new user')); ?></a></li>
          </ul>
        </li>

        <li class="nav-links-li <?php if(Route::currentRouteName()=='admin.view.category' || Route::currentRouteName()=='admin.page' || Route::currentRouteName()=='admin.create.category' || Route::currentRouteName()=='admin.page.create' || Route::currentRouteName()=='admin.page.edit'): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-file-lines"></i>
              </div>
              <span class="link_name"><?php echo e(get_phrase('Page')); ?> </span>
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
            <li><a  class="<?php if(Route::currentRouteName()=='admin.page'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.page')); ?>"><?php echo e(get_phrase('Pages')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.page.create'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.page.create')); ?>"><?php echo e(get_phrase('Create Page')); ?></a></li>
            <li><a  class="<?php if(Route::currentRouteName()=='admin.view.category'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.view.category')); ?>"><?php echo e(get_phrase('Category')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.create.category'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.create.category')); ?>"><?php echo e(get_phrase('Create Category')); ?></a></li>
          </ul>
        </li>

        <li class="nav-links-li <?php if(Route::currentRouteName()=='admin.view.product.category' || Route::currentRouteName()=='admin.create.product.category' || Route::currentRouteName()=='admin.view.product.brand' || Route::currentRouteName()=='admin.create.product.brand'): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-store"></i>
              </div>
              <span class="link_name"> <?php echo e(get_phrase('Marketplace')); ?> </span>
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
            <li><a class="<?php if(Route::currentRouteName()=='admin.view.product.category' || Route::currentRouteName()=='admin.create.product.category'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.view.product.category')); ?>"><?php echo e(get_phrase('Category')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.view.product.brand' || Route::currentRouteName()=='admin.create.product.brand'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.view.product.brand')); ?>"><?php echo e(get_phrase('Brand')); ?></a></li>
          </ul>
        </li>

        <li class="nav-links-li  <?php if(Route::currentRouteName()=='admin.blog' || Route::currentRouteName()=='admin.view.blog.category' || Route::currentRouteName()=='admin.create.blog.category' || Route::currentRouteName()=='admin.blog.create' || Route::currentRouteName()=='admin.blog.edit'): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-blog"></i>
              </div>
              <span class="link_name"><?php echo e(get_phrase('Blog')); ?></span>
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
            <li><a  class="<?php if(Route::currentRouteName()=='admin.blog'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.blog')); ?>"><?php echo e(get_phrase('Blogs')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.blog.create'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.blog.create')); ?>"><?php echo e(get_phrase('Create Blog')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.view.blog.category'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.view.blog.category')); ?>"><?php echo e(get_phrase('Category')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.create.blog.category'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.create.blog.category')); ?>"><?php echo e(get_phrase('Create Category')); ?></a></li>
          </ul>
        </li>

        <li class="nav-links-li  <?php if(Route::currentRouteName()=='admin.view.sponsor' || Route::currentRouteName()=='admin.create.sponsor'): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-rectangle-ad"></i>
              </div>
              <span class="link_name"><?php echo e(get_phrase('Sponsored Post')); ?></span>
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
            <li><a class="<?php if(Route::currentRouteName()=='admin.view.sponsor'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.view.sponsor')); ?>"><?php echo e(get_phrase('Ads')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.create.sponsor'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.create.sponsor')); ?>"><?php echo e(get_phrase('Create Ad')); ?></a></li>
          </ul>
        </li>

        <!-- menu starts here -->
        <li class="nav-links-li <?php if(Route::currentRouteName() == 'admin.reported.post.view'): ?> showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a class="w-100" href="<?php echo e(route('admin.reported.post.view')); ?>">
              <div class="sidebar_icon">
                <i class="fa-solid fa-ban"></i>
              </div>
              <span class="link_name">
                <?php echo e(get_phrase('Reported Post')); ?>

              </span>
            </a>
          </div>
        </li>

        <!-- menu starts here -->
        <li class="nav-links-li <?php if(Route::currentRouteName() == 'admin.payment_histories'): ?> showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a class="w-100" href="<?php echo e(route('admin.payment_histories')); ?>">
              <div class="sidebar_icon">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              <span class="link_name">
                <?php echo e(get_phrase('Payment history')); ?>

              </span>
            </a>
          </div>
        </li>

        <li class="nav-links-li <?php if(Route::currentRouteName()=='admin.about.page.data.view' || Route::currentRouteName()=='admin.live-video.view' || Route::currentRouteName()=='admin.privacy.page.data.view'|| Route::currentRouteName()=='admin.term.page.data.view' || Route::currentRouteName()=='admin.smtp.settings.view'|| Route::currentRouteName()=='admin.system.settings.view' || 
        Route::currentRouteName()=='admin.settings.payment' || 
        Route::currentRouteName()=='admin.language.settings' || Route::currentRouteName()=='admin.about' || Route::currentRouteName()=='admin.settings.amazon_s3' || 'admin.languages.edit.phrase' == Route::currentRouteName()): ?>showMenu <?php endif; ?>">
          <div class="iocn-link">
            <a href="#">
              <div class="sidebar_icon">
                <i class="fa-solid fa-gear"></i>
              </div>
              <span class="link_name"><?php echo e(get_phrase('Settings')); ?></span>
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
            <li><a class="<?php if(Route::currentRouteName()=='admin.system.settings.view'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.system.settings.view')); ?>"><?php echo e(get_phrase('System Setting')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.settings.amazon_s3'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.settings.amazon_s3')); ?>"><?php echo e(get_phrase('Amazon s3 settings')); ?> </a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.about.page.data.view'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.about.page.data.view')); ?>"><?php echo e(get_phrase('Custom Pages')); ?> </a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.live-video.view'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.live-video.view')); ?>"><?php echo e(get_phrase('Live video')); ?> </a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.settings.payment'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.settings.payment')); ?>"><?php echo e(get_phrase('Payment Setting')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.language.settings' || 'admin.languages.edit.phrase' == Route::currentRouteName()): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.language.settings')); ?>"><?php echo e(get_phrase('Language Setting')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.smtp.settings.view'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.smtp.settings.view')); ?>"><?php echo e(get_phrase('SMTP Setting')); ?></a></li>
            <li><a class="<?php if(Route::currentRouteName()=='admin.about'): ?>Active <?php endif; ?>" href="<?php echo e(route('admin.about')); ?>"><?php echo e(get_phrase('About')); ?></a></li>
          </ul>
        </li>
      </ul>
    </div><?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/sidebar.blade.php ENDPATH**/ ?>