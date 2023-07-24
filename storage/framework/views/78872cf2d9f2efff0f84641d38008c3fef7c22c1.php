
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loopIndex => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $total_comment_main_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id', 0)->get()->count();
        $total_comment_sub_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id',">", 0)->get()->count();
        $total_comments = $total_comment_main_comments + $total_comment_sub_comments;


        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.is_type', 'post')
            ->where('comments.id_of_type', $post->post_id)
            ->where('comments.parent_id', 0)
            ->select('comments.*', 'users.name', 'users.photo')
            ->orderBy('comment_id', 'DESC')->take(1)->get();

        
        $tagged_user_ids = json_decode($post->tagged_user_ids);
        
    ?>
    <?php $user_reacts = json_decode($post->user_reacts, true); ?>

    <div class="single-item-countable single-entry" id="postIdentification<?php echo e($post->post_id); ?>">
        <div class="entry-inner">
            <div class="entry-header d-flex justify-content-between">
                <div class="ava-info d-flex align-items-center">
                    <?php if(isset($type)&&$type=="page"): ?>
                        <div class="flex-shrink-0">
                            <img src="<?php echo e(get_page_logo($post->logo, 'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>  
                    <?php elseif(isset($type)&&$type=="group"): ?>
                        <div class="flex-shrink-0">
                            <img src="<?php echo e(get_user_image($post->photo, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>
                    <?php elseif(isset($type)&&$type=="video"): ?>
                        <div class="entry-header d-flex justify-content-between">
                            <div class="ava-info d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="<?php echo e(get_user_image($post->photo,'optimized')); ?>" class="rounded rounded-circle user_image_show_on_modal" alt="...">
                                
                                </div>
                                <div class="ava-desc ms-2">
                                    <h3 class="mb-0"><?php echo e($post->name); ?></h3>
                                    <small class="meta-time text-muted"><?php echo e(date('M d ', strtotime($post->created_at))); ?> at <?php echo e(date('H:i A', strtotime($post->created_at))); ?></small>
                                    <?php if($post->privacy=='public'): ?>
                                        <span class="meta-privacy text-muted"><i
                                            class="fa-solid fa-earth-americas"></i></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="post-controls dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><img src="<?php echo e(asset('assets/frontend/images/save.png')); ?>" alt="">
                                            <?php echo e(get_phrase('Save Video')); ?></a></li>
                                    <li><a class="dropdown-item" href="#"><img src="<?php echo e(asset('assets/frontend/images/link.png')); ?>" alt=""><?php echo e(get_phrase('Copy Link')); ?></a></li>
                                    <li><a class="dropdown-item" href="#"><img src="<?php echo e(asset('assets/frontend/images/report.png')); ?>"
                                                alt=""><?php echo e(get_phrase('Report')); ?> </a></li>
                                </ul>
                            </div>
                        </div>
                    <?php elseif(isset($type)&&$type=="user_post"): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(get_user_image($post->user_id, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
                    </div>
                    <?php else: ?>
                        <div class="flex-shrink-0">
                            <img src="<?php echo e(get_user_image($post->id, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>
                    <?php endif; ?>
                    <div class="ava-desc ms-2">
                        <h3 class="mb-0">
                            <?php if(isset($type)&&$type=="page"): ?>
                                <a class="text-black" href="<?php echo e(route('single.page',$post->id)); ?>"><?php echo e($post->title); ?></a>
                            <?php elseif(isset($type)&&$type=="group"): ?>
                                <a class="text-black" href="<?php echo e(route('user.profile.view',$post->user_id)); ?>"><?php echo e($post->name); ?></a>
                            <?php else: ?>
                                <a class="text-black" href="<?php echo e(route('user.profile.view',$post->user_id)); ?>"><?php echo e($post->getUser->name); ?>

                                    <?php if($post->user_id != auth()->user()->id): ?>
                                        <?php
                                            $follow = \App\Models\Follower::where('user_id',$post->user_id)->where('follow_id',$post->user_id)->count();
                                        ?>
                                        <?php if($follow>0): ?>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfollow',$post->user_id); ?>')"><?php echo e(get_phrase('Unfollow')); ?></a> 
                                        <?php else: ?>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.follow',$post->user_id); ?>')"><?php echo e(get_phrase('Follow')); ?></a> 
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                            <!-- Check tagged users -->

                            <?php if($post->post_type == 'cover_photo'): ?>
                                <small class="text-muted"><?php echo e(get_phrase('has changed cover photo')); ?></small>
                            <?php endif; ?>

                            <?php if($post->post_type == 'share'): ?>
                                <small class="text-muted"><?php echo e(get_phrase('shared post')); ?></small>
                            <?php endif; ?>

                            <?php if($post->post_type == 'live_streaming'): ?>
                                <?php
                                    $live_description = json_decode($post->description, true);
                                ?>
                                <?php if(is_array($live_description) && $live_description['live_video_ended'] == 'yes'): ?>
                                    <small class="text-muted"><?php echo e(get_phrase('was on live ____', [date_formatter($post->created_at, 3)])); ?></small>
                                <?php else: ?>
                                    <small class="text-muted"><?php echo e(get_phrase('is live now')); ?></small>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(count($tagged_user_ids) > 0 || $post->activity_id > 0): ?>
                                <small class="text-muted">-</small>

                                <!-- Feeling and activity -->
                                <?php if($post->activity_id > 0): ?>
                                    <?php
                                        $feeling_and_activities = DB::table('feeling_and_activities')->where('feeling_and_activity_id', $post->activity_id)->first();
                                    ?>
                                    <?php if($feeling_and_activities->type == 'activity'): ?>
                                        <?php echo e($feeling_and_activities->title); ?>

                                    <?php else: ?>
                                        <spam class="text-muted"><?php echo e(get_phrase('feeling')); ?></spam>
                                        <b> <?php echo e($feeling_and_activities->title); ?> </b>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if(count($tagged_user_ids) > 0): ?>
                                    <small class="text-muted"><?php echo e(get_phrase('with')); ?></small>
                                    <?php $__currentLoopData = $tagged_user_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tagged_user_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <small class="text-muted"><?php if($key > 0)echo','; ?></small>
                                        <a class="text-black" href="<?php echo e(route('profile')); ?>"><?php echo e(DB::table('users')->where('id', $tagged_user_id)->value('name')); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($post->location)): ?>
                                <small class="text-muted"><?php echo e(get_phrase('in')); ?></small> <a href="https://www.google.com/maps/place/<?php echo e($post->location); ?>" target="_blanck"><?php echo e($post->location); ?></a>
                            <?php endif; ?>
                        </h3>
                        <small class="meta-time text-muted"><?php echo e(date_formatter($post->created_at, 2)); ?></small>

                        <?php if($post->privacy == 'public'): ?>
                            <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i class="fa-solid fa-earth-americas"></i></span>
                        <?php elseif($post->privacy == 'private'): ?>
                            <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i class="fa-solid fa-user"></i></span>
                        <?php else: ?>
                            <span class="meta-privacy text-muted" title="<?php echo e(ucfirst(get_phrase($post->privacy))); ?>"><i class="fa-solid fa-users"></i></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="post-controls dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <input type="hidden"  id="copy_post_<?php echo e($post->post_id); ?>" value="<?php echo e(route('single.post',$post->post_id)); ?>" >
                        <li><a class="dropdown-item" href="javascript:void(0)" value="copy" onclick="copyToClipboard('copy_post_<?php echo e($post->post_id); ?>')" ><img src="<?php echo e(asset('storage/images/link.png')); ?>" alt=""><?php echo e(get_phrase('Copy Link')); ?></a></li>
                        <?php if($post->user_id == auth()->user()->id): ?>
                            <?php if($post->post_type != 'live_streaming' && $post->location == ''): ?>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="showCustomModal('<?php echo route('edit_post_form', $post->post_id); ?>', '<?php echo e(get_phrase('Edit post')); ?>', 'lg')" > <i class="fa-solid fa-pencil"></i> <?php echo e(get_phrase('Edit')); ?></a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="confirmAction('<?php echo route('post.delete', ['post_id' => $post->post_id]); ?>', true)" > <i class="fa-solid fa-trash-can"></i> <?php echo e(get_phrase('Delete')); ?></a>
                            </li> 
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.create_report','post_id'=>$post->post_id])); ?>', '<?php echo e(get_phrase('Report Post')); ?>');" data-bs-toggle="modal"
                            data-bs-target="#createEvent"><img src="<?php echo e(asset('storage/images/report.png')); ?>" alt=""><?php echo e(get_phrase('Report')); ?>

                                </a></li>  
                    </ul>
                </div> 
            </div>

            <!-- START POST VIEW -->
            <div class="entry-content pt-2">
                <!-- post description -->
                <?php if($post->post_type == 'general' || $post->post_type == 'profile_picture' || $post->post_type == 'cover_photo'): ?>
                    <?php echo script_checker($post->description); ?>
                    
                    <?php echo $__env->make('frontend.main_content.media_type_post_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(!empty($post->location)): ?>
                        <?php echo $__env->make('frontend.main_content.location_type_post_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>         
                    <?php endif; ?>
                <?php elseif($post->post_type == 'share'): ?>

                   <div class="py-1">
                        <div class="text-quote">
                            <?php if(\Illuminate\Support\Str::contains($post->description, 'http','https')): ?>
                                <?php
                                    $explode_data = explode( '/', $post->description );
                                    $shared_id = end($explode_data);
                                ?>
                                <iframe src="<?php echo e($post->description); ?>?shared=yes" onload="resizeIframe(this)" scrolling="no"  class="w-100" frameborder="0"></iframe>
                                <a class="ellipsis-line-1 ellipsis-line-2" href="<?php echo e($post->description); ?>"><?php echo e($post->description); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php elseif($post->post_type == 'live_streaming'): ?>
                    <?php echo $__env->make('frontend.main_content.live_streaming_type_post_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <!-- END POST VIEW -->

            <div class="entry-meta py-2 d-flex border-bottom justify-content-between align-items-center" >
                <a href="javascript:void(0)" id="post_reacts<?php echo $post->post_id; ?>">
                    <?php echo $__env->make('frontend.main_content.post_reacts', ['post_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </a>

                <div class="post-comment">
                    <ul>
                        <li><a onclick="$('#user-comments-<?php echo e($post->post_id); ?>').toggle();" href="javascript:void(0)"><span id="post_comment_count<?php echo e($post->post_id); ?>"><?php echo e($total_comments); ?></span><?php echo e(get_phrase('Comments')); ?></a></li>
                        <?php $sharecount = \App\Models\Post_share::where('post_id',$post->post_id)->get()->count(); ?>
                        <li><a href="javascript:void(0)"><span> <?php echo e($sharecount); ?> </span><?php echo e(get_phrase('Share')); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="entry-footer">
                <div class="footer-share pt-3 d-flex justify-content-around">
                    <span class="entry-react post-react">

                        <a href="javascript:void(0)" onclick="myReact('post', 'like', 'toggle', <?php echo e($post->post_id); ?>)" id="my_post_reacts<?php echo $post->post_id; ?>">
                            <?php echo $__env->make('frontend.main_content.post_reacts', ['my_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>

                        <ul class="react-list">
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'like', 'update', <?php echo e($post->post_id); ?>)"><img src="<?php echo e(asset('storage/images/like.svg')); ?>" alt="Like" style="margin-right: 1px;"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'love', 'update', <?php echo e($post->post_id); ?>)"><img src="<?php echo e(asset('storage/images/love.svg')); ?>" alt="Love" style="width: 30px; margin-top: 2px;"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'haha', 'update', <?php echo e($post->post_id); ?>)"><img src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt="Haha"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'sad', 'update', <?php echo e($post->post_id); ?>)"><img src="<?php echo e(asset('storage/images/sad.svg')); ?>" class="mx-1" alt="Sad"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'angry', 'update', <?php echo e($post->post_id); ?>)"><img src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt="Angry"></a>
                            </li>
                        </ul>
                    </span>
                    <span class="entry-react">
                        <a href="javascript:void(0)" onclick="$('#user-comments-<?php echo e($post->post_id); ?>').toggle();">
                            <img width="19px" src="<?php echo e(asset('storage/images/comment2.svg')); ?>">
                            <?php echo e(get_phrase('Comments')); ?>

                        </a>
                    </span>
                    <span class="entry-react" data-bs-toggle="modal" data-bs-target="">
                        <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id] )); ?>', '<?php echo e(get_phrase('Share post')); ?>');">
                            <img width="19px" src="<?php echo e(asset('storage/images/share2.svg')); ?>">
                            <?php echo e(get_phrase('Share')); ?>

                        </a>
                    </span>
                    <!-- Post share modal -->
                    
                </div>
            </div> <!-- Entry Footer End -->
        </div>
        <!-- Comment Start -->
        <div class="user-comments d-hidden bg-white" id="user-comments-<?php echo e($post->post_id); ?>" >
            <div class="comment-form d-flex p-3 bg-secondary">
                <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" alt="" class="rounded-circle img-fluid" width="40px">
                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                    <input class="form-control py-3" onkeypress="postComment(this, 0, <?php echo e($post->post_id); ?>, 0,'post');" rows="1" placeholder="Write Comments">
                </form>
            </div>
            <ul class="comment-wrap p-3 pb-0 list-unstyled" id="comments<?php echo e($post->post_id); ?>">
                <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$post->post_id,'type'=>"post"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>

            <?php if($comments->count() < $total_comments): ?>
                <a class="btn p-3 pt-0" onclick="loadMoreComments(this, <?php echo e($post->post_id); ?>, 0, <?php echo e($total_comments); ?>,'post')"><?php echo e(get_phrase('View more')); ?></a>
            <?php endif; ?>
        </div>
    </div><!--  Single Entry End -->
    
    <?php if(isset($search)&&!empty($search)): ?>
        <?php if($loopIndex==2): ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/posts.blade.php ENDPATH**/ ?>