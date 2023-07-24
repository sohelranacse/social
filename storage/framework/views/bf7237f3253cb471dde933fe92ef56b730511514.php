<div class="all-notify-control header-controls bg-white shadow-sm">
    <div class="notify-control">
        <div class="notify-inner shadow-sm">
            <h3 class="h4 py-4 border-bottom "><?php echo e(get_phrase('Notifications')); ?></h3>
            <div class="new-notif mt-4 pb-1">
                <h4 class="notify-title"><?php echo e(get_phrase('New')); ?> <span><?php echo e(count($new_notification)); ?></span></h4>
                <ul>
                    <?php $__currentLoopData = $new_notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($newNotification->type=="event"): ?>
                        <li class="notify-item eventn-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>"alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-calendar"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('invited you to like')); ?> </span> <a href="<?php echo e(route('single.event',$newNotification->getEventData->id)); ?>"> <?php echo e(ucfirst($newNotification->getEventData->title)); ?> </a>   </h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.event.request.from.notification',['id'=>$newNotification->sender_user_id,'event_id'=>$newNotification->getEventData->id]); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.event.request.from.notification',['id'=>$newNotification->sender_user_id,'event_id'=>$newNotification->getEventData->id]); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="group"): ?>
                        <li class="notify-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-users"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a> <span><?php echo e(get_phrase('invited you to like')); ?> </span> <?php echo e(ucfirst($newNotification->getGroupData->title)); ?></h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.group.request.from.notification',['id'=>$newNotification->sender_user_id,'group_id'=>$newNotification->getGroupData->id]); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.group.request.from.notification',['id'=>$newNotification->sender_user_id,'group_id'=>$newNotification->getGroupData->id]); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="profile"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4> <a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a> <span><?php echo e(get_phrase('sent you Friend Request')); ?></h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.friend.request.from.notification',$newNotification->sender_user_id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.friend.request.from.notification',$newNotification->sender_user_id); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="friend_request_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Friend Request')); ?> </h4>

                                        <?php if($newNotification->status=='0'): ?>
                                            <div class="btn-inline">
                                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('mark.as.read.notification',$newNotification->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Mark As Read')); ?></a>
                                            </div>
                                        <?php endif; ?>
                                       
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="group_invitation_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Group Invitation Request')); ?> </h4>
                                        <?php if($newNotification->status=='0'): ?>
                                            <div class="btn-inline">
                                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('mark.as.read.notification',$newNotification->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Mark As Read')); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="event_invitation_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Event Invitation Request')); ?> </h4>
                                        <?php if($newNotification->status=='0'): ?>
                                            <div class="btn-inline">
                                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('mark.as.read.notification',$newNotification->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Mark As Read')); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="new-notif mt-4 pb-1">
                <?php if(count($older_notification)>0): ?>
                    <h4 class="notify-title pb-1">Earlier <span><?php echo e(count($older_notification)); ?></span></h4>
                <?php endif; ?>
                
                <ul>
                    <?php $__currentLoopData = $older_notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($newNotification->type=="event"): ?>
                        <li class="notify-item eventn-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>"alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-calendar"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('invited you to like')); ?> </span> <a href="<?php echo e(route('single.event',$newNotification->getEventData->id)); ?>"> <?php echo e(ucfirst($newNotification->getEventData->title)); ?> </a>   </h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.event.request.from.notification',['id'=>$newNotification->sender_user_id,'event_id'=>$newNotification->getEventData->id]); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.event.request.from.notification',['id'=>$newNotification->sender_user_id,'event_id'=>$newNotification->getEventData->id]); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="group"): ?>
                        <li class="notify-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-users"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a> <span><?php echo e(get_phrase('invited you to like')); ?> </span> <?php echo e(ucfirst($newNotification->getGroupData->title)); ?></h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.group.request.from.notification',['id'=>$newNotification->sender_user_id,'group_id'=>$newNotification->getGroupData->id]); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.group.request.from.notification',['id'=>$newNotification->sender_user_id,'group_id'=>$newNotification->getGroupData->id]); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="profile"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4> <a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a> <span><?php echo e(get_phrase('sent you Friend Request')); ?></h4>
                                        <?php if($newNotification->status=='0'): ?>
                                        <div class="btn-inline">
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('accept.friend.request.from.notification',$newNotification->sender_user_id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Accept')); ?></a>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('decline.friend.request.from.notification',$newNotification->sender_user_id); ?>')" class="btn btn-danger"><?php echo e(get_phrase('Decline')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="friend_request_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Friend Request')); ?> </h4>
                                       
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="group_invitation_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Group Invitation Request')); ?> </h4>
                                       
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php elseif($newNotification->type=="event_invitation_accept"): ?>
                        <li class="notify-item friendr-item">
                            <div class="avatar-details">
                                <div class="d-flex">
                                    <div class="noti-avata me-3"><img width="48" class="rounded-circle" src="<?php echo e(get_user_image($newNotification->getUserData->id,"optimized")); ?>" alt="">
                                        <span class="notify-type"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <div class="noti-details">
                                        <h4><a href="<?php echo e(route('user.profile.view',$newNotification->getUserData->id)); ?>"><?php echo e(ucfirst($newNotification->getUserData->name)); ?></a><span> <?php echo e(get_phrase('accepted
                                            Your Event Invitation Request')); ?> </h4>
                                       
                                    </div>
                                </div>
                            </div>
                            <span class="noti-time"><?php echo e($newNotification->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?></span>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div> <!-- Earlier widget End -->
           
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/notification/notification.blade.php ENDPATH**/ ?>