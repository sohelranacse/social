<script type="text/javascript">

    // load_modal_content route name
    function ajaxModal(url, header, modalSize){
        jQuery('#common-modal .modal-dialog').removeClass('modal-sm');
        jQuery('#common-modal .modal-dialog').removeClass('modal-lg');
        jQuery('#common-modal .modal-dialog').removeClass('modal-xl');
        jQuery('#common-modal .modal-dialog').removeClass('modal-fullscreen');
        jQuery('#common-modal .modal-dialog').addClass(modalSize);

        jQuery('#common-modal .modal-body').html('<div class="d-flex justify-content-center my-5"><div class="spinner-border my-5" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        jQuery('#common-modal').modal('show', {backdrop: 'true'});

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#common-modal .modal-body').html(response);
                jQuery('#common-modal .modal-title').html(header);
            }
        });
    }
</script>

<div class="modal common-modal " id="common-modal" tabindex="-1"
        aria-labelledby="commonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-15px">{{ get_phrase('Loading...') }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            
            <div class="modal-body"></div>
        </div>
    </div>
</div>