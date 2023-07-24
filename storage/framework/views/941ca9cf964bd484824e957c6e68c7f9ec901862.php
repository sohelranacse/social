 <div class="profile-cover group-cover rounded mb-3">
        <?php echo $__env->make('frontend.groups.cover-photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="group-content profile-content">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                <?php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); ?>
                <?php if($join>0||$group->user_id==auth()->user()->id): ?>
                    <?php echo $__env->make('frontend.groups.iner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('frontend.main_content.create_post',['group_id'=>$group->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php
                        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'post')->where('comments.id_of_type', $group->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
                        $total_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $group->id)->where('comments.parent_id', 0)->get()->count();
                    ?>

                    <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$group->id,'type'=>"group"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <?php if($comments->count() < $total_comments): ?> 
                        <a class="btn p-3 pt-0" onclick="loadMoreComments(this, <?php echo e($group->id); ?>, 0, <?php echo e($total_comments); ?>,'group')"><?php echo e(get_phrase('View Comment')); ?></a>
                    <?php endif; ?>
                    
                        <?php echo $__env->make('frontend.main_content.posts',['type'=>"group"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    
                <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <?php echo e(get_phrase('join Group First')); ?>

                    </div>
                </div>
                <?php endif; ?>
            </div> <!-- COL END -->
            <!--  Group Content Inner Col End -->
            <?php echo $__env->make('frontend.groups.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div><!-- Group content End -->
<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/discuss.blade.php ENDPATH**/ ?>