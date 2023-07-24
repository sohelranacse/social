<?php if(!empty($message)): ?>
<?php $__currentLoopData = $message->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="single-item-countable mt-4" id="message-<?php echo e($message->id); ?>">
    <?php if($message->reciver_id==auth()->user()->id): ?>
        <div class="d-flex user-quote ">
            <?php
                $user = \App\Models\User::find($message->sender_id);
            ?>
            <?php if(empty($message->thumbsup)&&!empty($message->message)): ?>
                <img src="<?php echo e(get_user_image($user->id,'optimized')); ?>" alt="" class="avatar-sm me-2">
                <div class="quote-box">
                    <div class="text-quote mt-0">
                        <?php if(\Illuminate\Support\Str::contains($message->message, 'http','https')): ?>
                            <?php
                                $explode_data = explode( '/', $message->message );
                                $shared_id = end($explode_data);
                            ?>
                            <?php if($explode_data[count($explode_data)-2] == 'post'): ?>
                                <iframe src="<?php echo e(route('custom.shared.post.view',$shared_id)); ?>?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>  
                            <?php else: ?>
                                <iframe src="<?php echo e(route('single.product.iframe',$shared_id)); ?>?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>
                            <?php endif; ?>
                            <a class="text-dark ellipsis-line-2" href="<?php echo e($message->message); ?>" target="_blank"><?php echo e($message->message); ?></a>
                        <?php else: ?>
                            <?php echo e($message->message); ?>

                        <?php endif; ?>
                        <div class="quote-react d-flex position-relative">
                            <span class="entry-react post-react" id="ShowReactId_<?php echo e($message->id); ?>">
                                <?php echo $__env->make('frontend.chat.chat_react', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($message->thumbsup)&&empty($message->message)): ?>
            <div class="d-flex user-quote position-relative">
                <img src="<?php echo e(get_user_image($user->id,'optimized')); ?>" alt="" class="avatar-sm me-2">
                <div class="chat-react"><img src="<?php echo e(asset('assets/frontend/images/like-lg.png')); ?>" alt=""></div>
            </div>
        <?php endif; ?>
        <?php if(!empty($message->file)): ?>
            <?php
                $files = \App\Models\Media_files::where('chat_id',$message->id)->get();
            ?>
            <div class="d-flex user-quote user-reply justify-content-start">
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($file->file_type=="image"): ?>
                        <div class="quote-box">
                            <img src="<?php echo e(asset('storage/chat/images/'.$file->file_name)); ?>" alt="" class="quote_image_box_image" >
                        </div>
                    <?php else: ?>
                        <div class="quote-box">
                            <video class="w-100 shorts_custom_height" controls>
                                <source src="<?php echo e(asset('storage/chat/videos/'.$file->file_name)); ?>" type="">
                            </video>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>  
    <?php if($message->sender_id==auth()->user()->id): ?>
        <?php if(empty($message->thumbsup)&&!empty($message->message)): ?>
            <div class="d-flex user-quote user-reply justify-content-end">
                <div class="quote-react remove-icon-message">
                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo e(route('remove.chat',$message->id)); ?>"> <?php echo e(get_phrase('Remove')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="text-quote mt-0">
                    <?php if(\Illuminate\Support\Str::contains($message->message, 'http','https')): ?>
                        <?php
                            $explode_data = explode( '/', $message->message );
                            $shared_id = end($explode_data);
                        ?>
                        <?php if($explode_data[count($explode_data)-2] == 'post'): ?>
                            <iframe src="<?php echo e(route('custom.shared.post.view',$shared_id)); ?>?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>  
                        <?php else: ?>
                            <iframe src="<?php echo e(route('single.product.iframe',$shared_id)); ?>?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>
                        <?php endif; ?>
                        <a href="<?php echo e($message->message); ?>" class="text-dark ellipsis-line-2" target="_blank"><?php echo e($message->message); ?></a>
                    <?php else: ?>
                        <?php echo e($message->message); ?>

                    <?php endif; ?>

                </div>
            </div>  
        <?php endif; ?>
        <?php if(!empty($message->file)): ?>
                <?php
                    $files = \App\Models\Media_files::where('chat_id',$message->id)->get();
                ?>
                <div class="d-flex user-quote user-reply justify-content-end">
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($file->file_type=="image"): ?>
                            <div class="quote-box d-flex">
                                <div class="quote-react remove-icon-message">
                                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="<?php echo e(route('remove.chat',$message->id)); ?>"> <?php echo e(get_phrase('Remove')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <img class="rounded" src="<?php echo e(asset('storage/chat/images/'.$file->file_name)); ?>" class="quote_image_box_image"  alt="">
                            </div>
                        <?php else: ?>
                            <div class="quote-box d-flex">
                                <div class="quote-react remove-icon-message">
                                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="<?php echo e(route('remove.chat',$message->id)); ?>"> <?php echo e(get_phrase('Remove')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <video class="w-100 shorts_custom_height"  controls>
                                    <source src="<?php echo e(asset('storage/chat/videos/'.$file->file_name)); ?>" type="">
                                  </video>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        <?php endif; ?>
        <?php if(!empty($message->thumbsup)&&empty($message->message)): ?>
            <div class="d-flex user-quote user-reply justify-content-end">
                <div class="d-flex user-quote">
                    <div class="quote-react remove-icon-message">
                        <a class="dropdown-toggle" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo e(route('remove.chat',$message->id)); ?>"> <?php echo e(get_phrase('Remove')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-react mt-2"><img class="rounded" src="<?php echo e(asset('assets/frontend/images/like-lg.png')); ?>" alt=""></div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/chat/single-message.blade.php ENDPATH**/ ?>