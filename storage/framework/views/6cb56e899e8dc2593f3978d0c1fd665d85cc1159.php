<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php  
 $postOfThisEvent = \App\Models\Posts::where('publisher','event')->where('publisher_id',$event->id)->first(); 
 if(!empty($postOfThisEvent->post_id)){
    $postId = $postOfThisEvent->post_id;
 }else{
    $postId = 0;
 }


?>
<div class="col-lg-6 col-xl-4 col-md-4 col-sm-6 single-item-countable" id="event-<?php echo e($event->id); ?>">
            
    <div class="card event-card p-2">
        <a href="<?php echo e(route('single.event',$event->id)); ?>">
            <div class="event-image thumbnail-210-200" style="background-image: url('<?php echo e(viewImage("event",$event->banner,"thumbnail")); ?>')">
                <div class="event-date">
                    <?php $date = explode("-",$event->event_date); ?>
                    <span><?php echo e($date['2']); ?></span>
                </div>
            </div>
        </a>
        <div class="event-text">
            <small class="event-meta"><?php echo e(date('l', strtotime($event->event_date))); ?>, <?php echo e(date('d F Y', strtotime($event->event_date))); ?>, at <?php echo e($event->event_time); ?></small>
            <h3><a class="ellipsis-line-2" href="<?php echo e(route('single.event',$event->id)); ?>"><?php echo e(ellipsis($event->title, 100)); ?></a></h3>
            <div class="organiser d-flex mt-3 align-items-center">
                <a href="#"><img src="<?php echo e(get_user_image($event->getUser->photo, 'optimized')); ?>" width="35" class="user-round" alt=""></a>
                <div class="ognr-info ms-2">
                    <h6 class="m-0"><a href="#"><?php echo e($event->getUser->name); ?></a></h6>
                    <small class="mute"><?php echo e($event->location); ?></small>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.going',$event->id); ?>')" class="btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>" id="goingId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Going')); ?></a>
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notgoing',$event->id); ?>')" class="btn btn-secondary <?php if(!in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>" id="notGoingId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Cancel')); ?></a>

                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.interested',$event->id); ?>')" class="btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>" id="interestedId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Interested')); ?></a>
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notinterested',$event->id); ?>')" class="btn btn-secondary <?php if(!in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>" id="notInterestedId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('NotInterested')); ?></a>
                
                
                <div class="post-controls dropdown">
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i> 
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php if($event->user_id==auth()->user()->id): ?>
                            <li>
                                <button onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.events.edit_event', 'event_id' => $event->id] )); ?>', '<?php echo e(get_phrase('Edit Event')); ?>');" class="dropdown-item btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#createEvent"><i class="fa fa-edit me-1"></i> <?php echo e(get_phrase('Edit Event')); ?></button>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('event.delete', ['event_id' => $event->id]); ?>', true)" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-trash me-1"></i> <?php echo e(get_phrase('Delete Event')); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if($postId!=0): ?>
                            <li>
                                <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId] )); ?>', '<?php echo e(get_phrase('Share Event')); ?>');" class="dropdown-item "><i class="fa fa-share me-1"></i> <?php echo e(get_phrase('Share Event')); ?></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($search)&&!empty($search)): ?>
    <?php if($key==2): ?>
    <?php break; ?>
    <?php endif; ?>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/events/event-single.blade.php ENDPATH**/ ?>