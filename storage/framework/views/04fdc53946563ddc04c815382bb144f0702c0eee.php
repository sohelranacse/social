<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $total_child_comments = DB::table('comments')->where('comments.is_type', $type)->where('comments.parent_id', $comment->comment_id)->get()->count();

        $child_comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.parent_id', $comment->comment_id)
            ->select('comments.*', 'users.name', 'users.photo')
            ->orderBy('comment_id', 'DESC')->take(1)->get();

        $user_comment_reacts = json_decode($comment->user_reacts, true);
    ?>

    <!-- Comment item START -->
    <li class="comment-item" id="comment_<?php echo e($comment->comment_id); ?>">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <!-- Avatar -->
                <?php if(isset($type)&&$type=="page"): ?>
                    <div class="">
                        <a href="#"><img class="rounded-circle height-40px" src="<?php echo e(get_page_logo($comment->photo, 'logo')); ?>" alt="Profile photo"></a>
                    </div>
                <?php else: ?>
                    <div class="">
                        <a href="#"><img class="rounded-circle height-40px" src="<?php echo e(get_user_image($comment->photo, 'optimized')); ?>" alt="Profile photo"></a>
                    </div>
                <?php endif; ?>
                <div class="avatar-info ms-2">
                    <h4 class="ava-nave"><?php echo e($comment->name); ?></h4>
                    <div class="activity-time small-text text-muted"><?php echo e(date_formatter($comment->updated_at, 2)); ?></div>
                </div>
            </div>
            <div class="post-controls dropdown dotted">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('comment.delete', ['comment_id' => $comment->comment_id]); ?>', true)" class="dropdown-item"><i class="fa fa-trash me-1"></i> <?php echo e(get_phrase('Delete Comment')); ?></a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="comment-details" >
            <div class="comment-content bg-secondary" >
                <p><?php echo e($comment->description); ?></p>

                <a href="javascript:void(0)" id="comment_reacts<?php echo $comment->comment_id; ?>">
                    <?php echo $__env->make('frontend.main_content.comment_reacts', ['comment_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </a>
            </div>

            <ul class="nav mt-3">
                <li class="nav-item post-react">
                    <a class="nav-link" href="javascript:void(0)" onclick="myCommentReact('like', 'toggle', <?php echo e($comment->comment_id); ?>)" id="my_comment_reacts<?php echo $comment->comment_id; ?>">
                        <?php echo $__env->make('frontend.main_content.comment_reacts', ['my_react' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>

                    <ul class="react-list">
                        <li><a href="javascript:void(0)" onclick="myCommentReact('like', 'update', <?php echo e($comment->comment_id); ?>)"><img src="<?php echo e(asset('storage/images/like.svg')); ?>" class="" alt="Like" style="margin-right: 1px;"></a>
                        </li>
                        <li><a href="javascript:void(0)" onclick="myCommentReact('love', 'update', <?php echo e($comment->comment_id); ?>)"><img src="<?php echo e(asset('storage/images/love.svg')); ?>" alt="Love" style="width: 30px; margin-top: 2px;"></a>
                        </li>
                        <li><a href="javascript:void(0)" onclick="myCommentReact('haha', 'update', <?php echo e($comment->comment_id); ?>)"><img src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt="Angry"></a>
                        </li>
                        <li><a href="javascript:void(0)" onclick="myCommentReact('sad', 'update', <?php echo e($comment->comment_id); ?>)"><img src="<?php echo e(asset('storage/images/sad.svg')); ?>" class="mx-1" alt="Sad"></a>
                        </li>
                        <li><a href="javascript:void(0)" onclick="myCommentReact('angry', 'update', <?php echo e($comment->comment_id); ?>)"><img src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt="Angry"></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" onclick="$('.parent_comment_reply_fields:not(#reply_field<?php echo e($comment->comment_id); ?>)').hide(); $('#reply_field<?php echo e($comment->comment_id); ?>').toggle(0);" href="javascript:void(0)"><?php echo e(get_phrase('Reply')); ?></a></li>
            </ul>
            <div class="comment-form p-3 mb-4 bg-secondary d-hidden parent_comment_reply_fields" id="reply_field<?php echo e($comment->comment_id); ?>">
                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                    <input class="form-control py-3" onkeypress="postComment(this, <?php echo e($comment->comment_id); ?>, <?php echo e($post_id); ?>, 0,'<?php echo e($type); ?>');" placeholder="Write your reply">
                </form>
            </div>
        </div>
        <!-- Comment item nested START -->
        <ul class="comment-item-nested list-unstyled" id="child_comments<?php echo e($comment->comment_id); ?>">
            <?php echo $__env->make('frontend.main_content.child_comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>

        <?php if($child_comments->count() < $total_child_comments): ?>
            <a class="btn p-3 pt-0" onclick="loadMoreComments(this, <?php echo e($post_id); ?>, <?php echo e($comment->comment_id); ?>, <?php echo e($total_child_comments); ?>,'<?php echo e($type); ?>')"><?php echo e(get_phrase('View more')); ?></a>
        <?php endif; ?>
    </li>
        
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/comments.blade.php ENDPATH**/ ?>