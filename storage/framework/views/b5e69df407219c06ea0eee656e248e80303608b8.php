<?php $__currentLoopData = $shorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="video-shorts shorts-fixed-hight video-poster card single-item-countable" id="shorts-<?php echo e($short->id); ?>">
            <div class="position-relative shorts-height">
                <video class="plyr-js shorts_custom_height w-100" onpause="onPause(this)" onplay="pauseOtherVideos(this)" id="<?php echo e('shorts_'.$short->id); ?>">
                    <source src="<?php echo e(asset('storage/videos/'.$short->file)); ?>" type="">
                  </video>
                <div class="video-meta w-100 rounded-3" onclick="videoPlaytoggle('<?php echo e('#shorts_'.$short->id); ?>')">
                    <div class="video-avatar custom-shorts-heading">
                        <h3 class="h6 shotrs-heading custom-text-shadow"><?php echo e(get_phrase(ellipsis($short->title,'50'))); ?></h3>
                        <div class="avatar-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="avatar-img"><img src="<?php echo e(get_user_image( $short->getUser->photo ,'optimized')); ?>" class="user_image_show_on_modal rounded-circle" alt=""></div>
                                <div class="avatar-info ms-2">
                                    <h6 class="mb-0 "><a href="#" class="custom-text-shadow"><?php echo e($short->getUser->name); ?> </a></h6>
                                    <span class="small-text"><?php echo e($short->created_at->timezone(Auth::user()->timezone)->format("M d")); ?> at <?php echo e(date('H:i A', strtotime($short->created_at))); ?></span>
                                </div>
                            </div>
                            <?php
                                $follow = \App\Models\Follower::where('user_id',auth()->user()->id)->where('follow_id',$short->getUser->id)->count();
                            ?>
                            <?php if($follow>0): ?>
                                <a href="javascript:void(0)" onclick="event.stopPropagation(); ajaxAction('<?php echo route('user.unfollow',$short->getUser->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Unfollow')); ?></a> 
                            <?php else: ?>
                                <a href="javascript:void(0)" onclick="event.stopPropagation(); ajaxAction('<?php echo route('user.follow',$short->getUser->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Follow')); ?></a> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                        $post = \App\Models\Posts::where('publisher', 'video_and_shorts')->where('publisher_id',$short->id)->first();
                        $total_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id', 0)->get()->count();
                        $reply_comments = \App\Models\Comments::where('is_type', 'post')->where('id_of_type', $post->post_id)->whereNotNull('parent_id')->get()->count();
                        $total_comments = $total_comments + $reply_comments;
                        $totalreact = count(json_decode($post->user_reacts,true));
                        $user_reacts = json_decode($post->user_reacts, true);
                    ?>
                    <div class="video-share fs-4">
                        <?php
                            $user_info = \App\Models\User::find($short->getUser->id);
                        ?>
                        <span class="entry-react post-react fs-6 custom-text-shadow">
                            <a href="#" onclick="event.stopPropagation(); myReact('post', 'like', 'toggle', <?php echo e($post->post_id); ?>, 'number')" id="reactNumber<?php echo $post->post_id; ?>">
                                <?php echo $__env->make('frontend.main_content.post_reacts', ['my_react' => true,'user_reacts'=>$user_reacts,'user_info'=>$user_info,'type'=>'shorts'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                <span class="custom-text-shadow appendNumber"> <?php echo e($totalreact); ?></span>
                            </a>
                        </span>
                        <a href="#" onclick="event.stopPropagation();" data-bs-toggle="modal" data-bs-target="#ShortChat<?php echo e($short->id); ?>"> <i class="fa-solid fa-comment custom-text-shadow"></i> <br> <span class="fs-6"><?php echo e($total_comments); ?></span></a>
                        <a href="#" onclick="event.stopPropagation(); showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id] )); ?>', '<?php echo e(get_phrase('Share post')); ?>');"> <i class="fa-solid fa-share"></i><span class="fs-6 custom-text-shadow"><?php echo e(get_phrase('Share')); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $shorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade chat-box" id="ShortChat<?php echo e($short->id); ?>" tabindex="-1"  aria-labelledby="videoChatLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary d-flex">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            <?php echo e(get_phrase('Comments')); ?></h5>
                        <div class="chat-actions">
                            <button type="button" class="btn" data-bs-dismiss="modal"
                                aria-label="Close"><i
                                    class="fa fa-close fa-xl"></i></button>
                        </div>
                    </div>
                    <?php
                        $post = \App\Models\Posts::where('publisher_id',$short->id)->where('publisher','video_and_shorts')->first();
                        $comments = \App\Models\Comments::where('is_type','post')->where('id_of_type',$post->post_id)->get();
                    ?>
                    <div class="modal-body">
                        <div class="user-comments bg-white" id="user-comments-<?php echo e($post->post_id); ?>" >
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
                    </div>                              
                 </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/video-shorts/shorts-single.blade.php ENDPATH**/ ?>