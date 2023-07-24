<?php $__currentLoopData = $previousChatList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $previousChatList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $msg_starter_id = $previousChatList->sender_id == auth()->user()->id ? $previousChatList->reciver_id:$previousChatList->sender_id;
        if($msg_starter_id==auth()->user()->id){
            continue;
        }
        $user = \App\Models\User::find($msg_starter_id);
        $lastMsg = \App\Models\Chat::where('message_thrade',$previousChatList->id)->orderBy('id', 'desc')->first();
        $unreadMsgCount = \App\Models\Chat::where('message_thrade',$previousChatList->id)->where('reciver_id',$user->id)->where('read_status', '0')->count();
    ?>
    <div class="single-contact d-flex align-items-center justify-content-between <?php if($unreadMsgCount>1): ?> bg-my-black <?php endif; ?>">
            <div class="avatar d-flex align-items-center">
                <a href="<?php echo e(route('chat',$user->id)); ?>" class="d-flex align-items-center">
                    <div class="avatar me-3 avatar-xl">
                        <img src="<?php echo e(get_user_image($user->photo,'optimized')); ?>" class="img-fluid rounded-circle w-100" alt="">
                        <?php if($user->isOnline()): ?>
                            <span class="online-status active"></span>
                        <?php endif; ?>
                    </div>
                </a>
                <div class="avatar-info">
                    <a href="<?php echo e(route('chat',$user->id)); ?>"><h3 class="h6 mb-0"><?php echo e($user->name); ?></h3></a>
                    <span>
                        <?php if(!empty($lastMsg->thumbsup)): ?>
                                <i class="fa-solid fa-thumbs-up fs-6"></i>
                        <?php else: ?>
                            <a href="<?php echo e(route('chat',$user->id)); ?>"><?php echo e(isset($lastMsg->message) ? ellipsis($lastMsg->message,30):""); ?> <?php if($unreadMsgCount>1): ?> <span class="badge bg-primary"><?php echo e($unreadMsgCount); ?></span><?php endif; ?></a>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="m-user-action">
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo e(route('user.profile.view',$user->id)); ?>"><i class="fa fa-user"></i> <?php echo e(get_phrase('View Profile')); ?> </a></li>
                    </ul>
                </div>
            </div>
    </div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/chat/single-chated.blade.php ENDPATH**/ ?>