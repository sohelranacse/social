<script>

    "use strict";

    var timer = 0;
    function searchFriendsForInviting(e, showOn){
       
    	$('.suggestions-loaging-bar').removeClass('d-none');

        var searchValue = $(e).val();
        
        clearTimeout(timer);
        timer = setTimeout(function () {
            $.ajax({
				type: 'get',
				url: '{{url("/search_friends_for_inviting")}}',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data:{'search_value':searchValue},
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



    function inviteGroupPeople(user_id, user_name){

        if($('#invitedGroupUser > #invitedGroupUserLabel'+user_id).length > 0){
            $('#invitedGroupUser > #invitedGroupUserLabel'+user_id).remove();
            $('#invitedGroupUser > #invitedGroupUserLabel'+user_id).remove();
        }else{
            var label = ' <a class="ms-2 my-2" id="invitedGroupUserLabel'+user_id+'" onclick="inviteGroupPeople('+user_id+')" href="javascript:void(0)">'+user_name+' <i class="fa-solid fa-circle-xmark"></i> </a> ';
            var inputField = '<input id="invitedGroupUserId'+user_id+'" value="'+user_id+'" type="hidden" name="invited_group_users_id[]">';

            $('#invitedGroupUser').append(label+inputField);
        }
    }
</script>
