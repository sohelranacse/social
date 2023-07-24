<script type="text/javascript">
	"use strict";
	
	function postComment(e, parent_id, post_id, comment_id,type) {
		var key = window.event.keyCode;
		var description = $(e).val();

		// If the user has pressed enter
		if (key === 13 && description != "") {
			$.ajax({
				type: 'get',
				url: '{{url("/post_comment")}}',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data: {
					description:description,
					parent_id:parent_id,
					post_id:post_id,
					comment_id:comment_id,
					type:type
				},
				success: function(response){
					$(e).val("");

					if(parent_id == 0){
						$('#comments'+post_id).prepend(response);
					}else{
						$('#child_comments'+parent_id).prepend(response);
					}


					if(response){
						$.ajax({
							url: '{{url("/post_comment_count")}}',
							type: "get",
							data: {
								post_id:post_id,
								type:type
							},
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
							},
							success: function(response) {
								if(response){
									$('#post_comment_count'+post_id).text(response);
								}
							}
						});
					}



				}
			});
		}
	}

	function myReact(type, react, requestType, postId, responseType = null){
		$.ajax({
			type: 'post',
			url: '{{url("/my_react")}}',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			},
			data: {
				type:type,
				react:react,
				request_type:requestType,
				post_id:postId,
				response_type:responseType
			},
			success: function(response){
				if(responseType == 'number'){
					$('#reactNumber'+postId + ' .appendNumber').html(response);
				}else{
					var user_reacts_response = response.split('<hr>');

					$('#post_reacts'+postId).html(user_reacts_response[0]);
					$('#my_post_reacts'+postId).html(user_reacts_response[1]);
				}
			}
		});
	}

	function myCommentReact(react, requestType, commentId){
		$.ajax({
			type: 'get',
			url: '{{url("/my_comment_react")}}',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			},
			data: {
				react:react,
				request_type:requestType,
				comment_id:commentId
			},
			success: function(response){
				var user_reacts_response = response.split('<hr>');

				$('#comment_reacts'+commentId).html(user_reacts_response[0]);
				$('#my_comment_reacts'+commentId).html(user_reacts_response[1]);
			}
		});
	}

	function loadMoreComments(e, postId, parent_id, total_comments,type){
		if(parent_id == 0){
			var total_loaded_comments = $('#comments'+postId+' > li').length;
		}else{
			var total_loaded_comments = $('#child_comments'+parent_id+' > li').length;
		}

		$.ajax({
			type: 'get',
			url: '{{url("/load_post_comments")}}',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			},
			data: {
				post_id:postId,
				parent_id:parent_id,
				total_loaded_comments:total_loaded_comments,
				type:type
			},
			success: function(response){
				if(parent_id == 0){
					$('#comments'+postId).append(response);

					total_loaded_comments = $('#comments'+postId+' > li').length;
					if(total_comments <= total_loaded_comments){
						$(e).hide();
					}
				}else{
					$('#child_comments'+parent_id).append(response);

					total_loaded_comments = $('#child_comments'+parent_id+' > li').length;
					if(total_comments <= total_loaded_comments){
						$(e).hide();
					}
				}
			}
		});
	}

	function post_privacy(privacy, e, postPrivacyDroupdownId, inputId){
        $('#'+inputId).val(privacy);
        $('#'+postPrivacyDroupdownId).html($(e).html());
    }

    function tagPeople(user_id, user_name){

        if($('#taggedUsers > #taggedUserLabel'+user_id).length > 0){
            $('#taggedUsers > #taggedUserLabel'+user_id).remove();
            $('#taggedUsers > #taggedUserId'+user_id).remove();
        }else{
            var label = '<a class="ms-2 my-2" id="taggedUserLabel'+user_id+'" onclick="tagPeople('+user_id+')" href="javascript:void(0)">'+user_name+'</a>';
            var inputField = '<input id="taggedUserId'+user_id+'" value="'+user_id+'" type="hidden" name="tagged_users_id[]">';

            $('#taggedUsers').append(label+inputField);
        }
    }

    function addFeelingActivity(feeling_and_activity_id, title, icon, iconExt){

    	if(iconExt == 'png' || iconExt == 'jpg' || iconExt == 'ico'){
    		var icon = "<img src='<?php echo asset('storage/images'); ?>/"+icon+"'>";
    	}else{
    		var icon = '<i class="+'+icon+'+"></i>';
    	}

    	if($('#feeling_and_activities > #feeling_and_activities_label'+feeling_and_activity_id).length > 0){
            $('#feeling_and_activities > #feeling_and_activities_label'+feeling_and_activity_id).remove();
            $('#feeling_and_activities > #feeling_and_activity_id'+feeling_and_activity_id).remove();
        }else{
            var label = '<a class="ms-2 my-2" id="feeling_and_activities_label'+feeling_and_activity_id+'" onclick="addFeelingActivity('+feeling_and_activity_id+')" href="javascript:void(0)">'+icon+' '+title+'</a>';
            var inputField = '<input id="feeling_and_activity_id'+feeling_and_activity_id+'" value="'+feeling_and_activity_id+'" type="hidden" name="feeling_and_activity_id">';

            $('#feeling_and_activities').html(label+inputField);
        }
    }

    var timer = 0;
    function searchFriendsForTagging(e, showOn){

    	$('.suggestions-loaging-bar').removeClass('d-none');

        var searchValue = $(e).val();
        
        clearTimeout(timer);
        timer = setTimeout(function () {
            $.ajax({
				type: 'get',
				url: '{{url("/search_friends_for_tagging")}}',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data:{'search_value':searchValue},
				success: function(response){
					$(showOn).html(response);
					if(!$('.suggestions-loaging-bar').hasClass('d-none')){
			    		$('.suggestions-loaging-bar').addClass('d-none');
			    	}
				}
			});
        } ,1000);
    }

    function confirmLiveStreaming(){
    	$('.alert-modal.custom-modal').addClass('custom-modal-show');
    	$('#alertContinueLink').attr('onclick', 'startLiveStreaming()');
    }
    function startLiveStreaming(){
    	$('#post_type').val('live_streaming');

    	setTimeout(function(){
    		$('#createPostForm').submit();
    	}, 500);
    }


	function copyToClipboard(id) { 
        var copyText = document.getElementById(id);
		copyText.type = 'text';
		copyText.select();
		document.execCommand("copy");
		copyText.type = 'hidden';
		alert_message("{{get_phrase('Link Copied')}}");
    }

	// share module jquery
	
	$('#timelinePostBtn').click(function() {
		$('#timelinePostBtn').addClass('active-own-button');
		$('#groupPostButton').removeClass('active-own-button');
		$('#messageSendButton').removeClass('active-own-button');

		$('#timeline-content-area').removeClass('d-none');
		$('#timeline-content-area').addClass('d-block');
		$('#message-content-area').addClass('d-none');
		$('#group-content-area').addClass('d-none');

		$('#ShareButton').removeClass('d-none');
		$('#ShareButton').addClass('d-block');
	});

	$('#messageSendButton').click(function() {
		$('#messageSendButton').addClass('active-own-button');
		$('#groupPostButton').removeClass('active-own-button');
		$('#timelinePostBtn').removeClass('active-own-button');

		$('#message-content-area').removeClass('d-none');
		$('#message-content-area').addClass('d-block');
		$('#group-content-area').addClass('d-none');
		$('#timeline-content-area').addClass('d-none');
		$('#ShareButton').addClass('d-none');
		$('#ShareButton').removeClass('d-block');
	});


	$('#groupPostButton').click(function() {
		$('#groupPostButton').addClass('active-own-button');
		$('#messageSendButton').removeClass('active-own-button');
		$('#timelinePostBtn').removeClass('active-own-button');

		$('#group-content-area').removeClass('d-none');
		$('#group-content-area').addClass('d-block');
		$('#message-content-area').addClass('d-none');
		$('#timeline-content-area').addClass('d-none');

		$('#ShareButton').addClass('d-none');
		$('#ShareButton').removeClass('d-block');
	});


	

</script>
