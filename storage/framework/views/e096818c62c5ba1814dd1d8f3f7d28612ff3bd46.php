<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header d-lg-none py-4">
        <div class="logo">
            <img class="max-width-200" width="80%" src="<?php echo e(asset('storage/logo/dark/'.get_settings('system_dark_logo'))); ?>" alt="">
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="timeline-navigation">
            <nav class="menu-wrap">
                <ul>
                    <li class="<?php if(Route::currentRouteName()=='timeline' || Route::currentRouteName()=='single.post'): ?> active <?php endif; ?>"><a href="<?php echo e(route('timeline')); ?>"><img src="<?php echo e(asset('storage/images/timeline-2.svg')); ?>"
                                alt="Timeline"><?php echo e(get_phrase('Timeline')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='profile' || Route::currentRouteName()=='profile.friends'|| Route::currentRouteName()=='profile.photos'|| Route::currentRouteName()=='profile.album'|| Route::currentRouteName()=='profile.videos'): ?> active <?php endif; ?>"><a href="<?php echo e(route('profile')); ?>"><img src="<?php echo e(asset('storage/images/man-2.svg')); ?>" alt="Profile"><?php echo e(get_phrase('Profile')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='groups' || Route::currentRouteName()=='single.group'|| Route::currentRouteName()=='group.people.info'|| Route::currentRouteName()=='group.event.view'|| Route::currentRouteName()=='single.group.photos'): ?> active <?php endif; ?>"><a href="<?php echo e(route('groups')); ?>"><img src="<?php echo e(asset('storage/images/group-2.svg')); ?>" alt="Group"><?php echo e(get_phrase('Group')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='pages' || Route::currentRouteName()=='single.page'|| Route::currentRouteName()=='single.page.photos'|| Route::currentRouteName()=='page.videos'): ?> active <?php endif; ?>"><a href="<?php echo e(route('pages')); ?>"><img src="<?php echo e(asset('storage/images/page-2.svg')); ?>" alt="Page"><?php echo e(get_phrase('Page')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='allproducts' || Route::currentRouteName()=='userproduct'|| Route::currentRouteName()=='single.product'|| Route::currentRouteName()=='filter.product'|| Route::currentRouteName()=='product.saved'): ?> active <?php endif; ?>"><a href="<?php echo e(route('allproducts')); ?>"><img src="<?php echo e(asset('storage/images/marketplace-2.svg')); ?>" alt="Marketplace"><?php echo e(get_phrase('Marketplace')); ?></a>
                    </li>
                    <li class="<?php if(Route::currentRouteName()=='videos' || Route::currentRouteName()=='video.detail.info'|| Route::currentRouteName()=='shorts'|| Route::currentRouteName()=='save.all.view'): ?> active <?php endif; ?>"><a href="<?php echo e(route('videos')); ?>"><img src="<?php echo e(asset('storage/images/video-2.svg')); ?>" alt="Video and Shorts"><?php echo e(get_phrase('Video and Shorts')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='event' || Route::currentRouteName()=='userevent'|| Route::currentRouteName()=='single.event'): ?> active <?php endif; ?>"><a href="<?php echo e(route('event')); ?>"><img src="<?php echo e(asset('storage/images/events-2.svg')); ?>" alt="Event"><?php echo e(get_phrase('Event')); ?></a></li>
                    <li class="<?php if(Route::currentRouteName()=='blogs' || Route::currentRouteName()=='create.blog'|| Route::currentRouteName()=='myblog'|| Route::currentRouteName()=='blog.edit'|| Route::currentRouteName()=='single.blog'|| Route::currentRouteName()=='category.blog'): ?> active <?php endif; ?>"><a href="<?php echo e(route('blogs')); ?>"><img src="<?php echo e(asset('storage/images/blogging-2.svg')); ?>" alt="Blog"><?php echo e(get_phrase('Blog')); ?></a></li>
                </ul>
            </nav>
            <div class="footer-nav">
                <div class="footer-menu py-2">
                    <ul>
                        <li><a href="<?php echo e(route('about.view')); ?>"><?php echo e(get_phrase('About')); ?></a></li>
                        <li><a href="<?php echo e(route('policy.view')); ?>"><?php echo e(get_phrase('Privacy Policy')); ?></a></li>
                    </ul>
                </div>
                <div class="copy-rights text-muted">
                    <?php
                        $sitename = \App\Models\Setting::where('type','system_name')->value('description');
                    ?>
                    <p>© <?php echo e(date('Y')); ?> <?php echo e($sitename); ?></p>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/left_navigation.blade.php ENDPATH**/ ?>