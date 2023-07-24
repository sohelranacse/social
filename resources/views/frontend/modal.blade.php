<div class="modal common-modal fade" id="common-modal" tabindex="-1"
        aria-labelledby="commonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ get_phrase('Loading...') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            
            <div class="modal-body">
                <div class="d-flex justify-content-center py-5">
                    <div class="spinner-border m-5" role="status">
                        <span class="visually-hidden">{{ get_phrase('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal story-create-modal fade" id="story-create-modal" tabindex="-1"
        aria-labelledby="story-create-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><i class="fa fa-plus-circle me-2"></i><?php echo get_phrase('Create new story'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            
            <div class="modal-body">
                <div class="d-flex justify-content-center py-5">
                    <div class="spinner-border m-5" role="status">
                        <span class="visually-hidden">{{ get_phrase('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal story-modal fade" id="story-modal" tabindex="-1"
        aria-labelledby="storyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">{{get_phrase('Stories')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            
            <div class="modal-body">
                <div class="d-flex justify-content-center py-5">
                    <div class="spinner-border m-5" role="status">
                        <span class="visually-hidden">{{ get_phrase('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="custom-modal-md custom-modal custom-modal-effect-1" id="customModal">
    <div class="custom-modal-content">
        <button class="custom-modal-closed"><i class="fa fa-close"></i></button>
        <h5 class="custom-modal-title border-bottom text-center">{{ get_phrase('Loading...') }}</h5>
        <div id="customModalBody" class="custom-modal-body w-100 px-4 pt-3 pb-4">
            <div class="custom-modal-body-loader">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">{{ get_phrase('Loading...') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert-modal custom-modal custom-modal-effect-1" id="alertModal">
    <div class="custom-modal-content">
        <button class="alert-modal custom-modal-closed"><i class="fa fa-close"></i></button>
        <h6 class="custom-modal-title py-3">{{get_phrase('Confirmation')}}</h6>
        <div class="w-100 px-1 text-center pt-3 pb-4">
            <h6>{{get_phrase('Are you sure')}}?</h6>
            <a href="javascript:;" class="alert-cancel-btn btn btn-secondary mt-3 me-5 px-4">{{get_phrase('Cancel')}}</a>
            <a href="javascript:;" id="alertContinueLink" class="btn btn-primary mt-3 px-3">{{get_phrase('Continue')}}</a>
        </div>
    </div>
</div>

<div class="custom-modal-overlay"></div>

