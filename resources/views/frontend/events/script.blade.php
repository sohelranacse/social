<script>

    "use strict";

    var timer = 0;
    function searchUserForInviting(e, showOn){
       
    	$('.suggestions-loaging-bar').removeClass('d-none');

        var searchValue = $(e).val();

        let currentURL = $(location).attr('href'); 
    	let id = currentURL.substring(currentURL.lastIndexOf('/') + 1);
        
        clearTimeout(timer);
        timer = setTimeout(function () {
            $.ajax({
				type: 'get',
				url: '{{url("/search_user_for_event_inviting")}}',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data:{'search_value':searchValue,'id':id},
				success: function(response){
                    console.log(response)
					$(showOn).html(response);
					if(!$('.suggestions-loaging-bar').hasClass('d-none')){
			    		$('.suggestions-loaging-bar').addClass('d-none');
			    	}
				}
			});
        } ,1000);
    }



    function inviteEventPeople(user_id, user_name){

        if($('#invitedEventUser > #invitedEventUserLabel'+user_id).length > 0){
            $('#invitedEventUser > #invitedEventUserLabel'+user_id).remove();
            $('#invitedEventUser > #invitedEventUserLabel'+user_id).remove();
        }else{
            var label = ' <a class="ms-2 my-2" id="invitedEventUserLabel'+user_id+'" onclick="inviteEventPeople('+user_id+')" href="javascript:void(0)">'+user_name+' <i class="fa-solid fa-circle-xmark"></i> </a> ';
            var inputField = '<input id="invitedEventUserId'+user_id+'" value="'+user_id+'" type="hidden" name="invited_event_users_id[]">';

            $('#invitedEventUser').append(label+inputField);
        }
    }
</script>
