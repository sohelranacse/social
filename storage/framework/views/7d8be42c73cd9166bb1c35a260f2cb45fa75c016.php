<script type="text/javascript">
	"use strict";
	
	function createStoryForm(data){
		var url = "<?php echo url('/load_modal_content'); ?>/"+data;
		$('#story-create-modal').modal('show');

		$.ajax({
			type: 'get',
			url: url,
			success: function(response){
				$('#story-create-modal .modal-body').html(response);
			}
		});
	}

	function loadMaps(elementId){
		var map = L.map(elementId, {
            center: [ 52.3727598, 4.8936041 ],
            zoom: 15,
        });
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {autocomplete: true}).addTo(map);
        map.addControl(L.control.search()).on('keyup', function (e) {});

        //For reloading the maps in modal
        setTimeout(function(){
			map.invalidateSize();
		}, 100);
	}




	function showCustomModal(url, title, modal_type){
		$('#customModal').removeClass('custom-modal-sm');
		$('#customModal').removeClass('custom-modal-md');
		$('#customModal').removeClass('custom-modal-lg');
		$('#customModal').removeClass('custom-modal-xl');
		$('#customModal').removeClass('custom-modal-xxl');
		if(modal_type){
			$('#customModal').addClass('custom-modal-'+modal_type);
		}else{
			$('#customModal').addClass('custom-modal-md');
		}

		$('#customModal').addClass('custom-modal-show');

		$('#customModal .custom-modal-title').html(title);
		$.ajax({
			type: 'get',
			url: url,
			success: function(response){
				$('#customModalBody').html(response);
			}
		});
	}

	//Ajax action start
		function ajaxAction(url, method, formData){
			if(!method){
				method = 'get';
			}
			$.ajax({
				type: method,
				url: url,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data: {formData},
				success: function(response){
					console.log(response)
	            	distributeServerResponse(response);
				}
			});
		}
	//End ajax action

	//Ajax action start
		function confirmAction(url, is_ajax){
			$('.alert-modal.custom-modal').addClass('custom-modal-show');
			if(is_ajax == true){
				$('#alertContinueLink').attr('onclick', "ajaxAction('"+url+"')");
				$('#alertContinueLink').attr('href', 'javascript:void(0)');
			}else{
				$('#alertContinueLink').attr('href', url);
				$('#alertContinueLink').removeAttr('onclick');
			}
		}
	//End ajax action

	//Server response distribute
	function distributeServerResponse(response){
		if (response) {
			response = JSON.parse(response);
			//For redirect to another url
		    if(typeof response.url != "undefined" && response.url != 0){
		    	window.location.href = response.url;
		    }

		    //For reload after submission
		    if(typeof response.reload != "undefined" && response.reload != 0){
		    	location.reload();
		    }

		    //For show element in a specific element
		    if(typeof response.elemSelector != "undefined" && response.elemSelector != 0){
		    	$(response.elemSelector).html(response.content);
		    	$(response.elemSelector).show();
		    }

		    //for show a element
		    if(typeof response.showElem != "undefined" && response.showElem != 0){
		    	$(response.showElem).css('display', 'inline-block');
		    }

		   
		    //for hide a element
		    if(typeof response.hideElem != "undefined" && response.hideElem != 0){
		    	$(response.hideElem).hide();
		    }

		    //for fade in a element
		    if(typeof response.fadeInElem != "undefined" && response.fadeInElem != 0){
		    	$(response.fadeInElem).show();
		    }

		    //for fade out a element
		    if(typeof response.fadeOutElem != "undefined" && response.fadeOutElem != 0){
		    	$(response.fadeOutElem).hide();
		    }

		    //for hide custom modal
		    if(typeof response.hideCustomModal != "undefined" && response.hideCustomModal != 0){
		    	$('#customModal').removeClass('custom-modal-show');
		    }

		    //For showing success message
		    if(typeof response.errorMessage != "undefined" && response.errorMessage != 0){
		    	console.log('Success message '+response.errorMessage);
		    }

		    //For showing error message
		    if(typeof response.successMessage != "undefined" && response.successMessage != 0){
		    	console.log('Error message '+response.successMessage);
		    }

		    //For showing alert message
		    if(typeof response.alertMessage != "undefined" && response.alertMessage != 0){
		    	alert_message(response.alertMessage);
		    }

		    //For appending elements
		    if(typeof response.appendElement != "undefined" && response.appendElement != 0){
		    	$(response.appendElement).append(response.content);
		    }

		    //Fo prepending elements
		    if(typeof response.prependElement != "undefined" && response.prependElement != 0){
		    	$(response.prependElement).prepend(response.content);
		    }

		    //For appending elements after a element
		    if(typeof response.appendAfterElement != "undefined" && response.appendAfterElement != 0){
		    	$(response.appendAfterElement).after(response.content);
		    }

			if(typeof response.replaceUrl != "undefined" && response.replaceUrl != 0){
		    	window.location.href(response.url);
		    }



		    //For form validation Error
		    if(typeof response.validationError != "undefined" && response.validationError != 0){
				
				$('.form-validation-error-label').remove();
				Object.keys(response.validationError).forEach(key => {
					if($("[name="+key+"]").height() > 0){
							$("[name="+key+"]").after('<small class="form-validation-error-label">'+response.validationError[key][0]+'</small>');
					}else{
						$("input[name='"+key+"[]']").after('<small class="form-validation-error-label">'+response.validationError[key][0]+'</small>');
					}
				});
		    }
		    
		}
	}

	//Scroll and load data start
	$(window).scroll(function() {
		if($('#timeline-posts').height()){
	    	loadContentByScrolling("#timeline-posts", "<?php echo e(route('load_post_by_scrolling')); ?>");
	    }
		if($('#profile-timeline-posts').height()){
	    	loadContentByScrolling("#profile-timeline-posts", "<?php echo e(route('profile.load_post_by_scrolling')); ?>");
	    }
		if($('#user-timeline-posts').height()){
	    	loadContentByScrolling("#user-timeline-posts", "<?php echo e(route('user.load_post_by_scrolling')); ?>");
	    }
	    if($('#my-friends-list').height()){
	    	loadContentByScrolling("#my-friends-list", "<?php echo e(route('profile.load_my_friends')); ?>");
	    }
	    if($('#my-friend-request-list').height()){
	    	loadContentByScrolling("#my-friend-request-list", "<?php echo e(route('profile.load_my_friend_requests')); ?>");
	    }
	    if($('#allPhotos').height()){
	    	loadContentByScrolling("#allPhotos", "<?php echo e(route('profile.load_photos')); ?>");
	    }
	    if($('#allVideos').height()){
	    	loadContentByScrolling("#allVideos", "<?php echo e(route('profile.load_videos')); ?>");
	    }
	    if($('#profile-album-row').height()){
	    	loadContentByScrolling("#profile-album-row", "<?php echo e(route('profile.load_albums')); ?>");
	    }
	    if($('#eventdata').height()){
	    	loadContentByScrolling("#eventdata", "<?php echo e(route('load_event_by_scrolling')); ?>");
	    }
	    if($('#productdata').height()){
	    	loadContentByScrolling("#productdata", "<?php echo e(route('load_product_by_scrolling')); ?>");
	    }
	    if($('#blogdatashow').height()){
	    	loadContentByScrolling("#blogdatashow", "<?php echo e(route('load_blog_by_scrolling')); ?>");
	    }

	    if($('#pagedata').height()){
	    	loadContentByScrolling("#pagedata", "<?php echo e(route('load_page_by_scrolling')); ?>");
	    }

	    if($('#groupLodingView').height()){
	    	loadContentByScrolling("#groupLodingView", "<?php echo e(route('load_groups_by_scrolling')); ?>");
	    }

	   

	    if($('#videoShowData').height()){
	    	loadContentByScrolling("#videoShowData", "<?php echo e(route('load_videos_by_scrolling')); ?>");
	    }

	    if($('#shortsShowed').height()){
			
	    	loadContentByScrolling("#shortsShowed", "<?php echo e(route('load_shorts_by_scrolling')); ?>");
			
	    }

		

	});

	function loadContentByScrolling(elem, url){
		var bottom_of_element = Math.floor($(elem).offset().top + $(elem).outerHeight());
		var bottom_of_screen = Math.floor($(window).scrollTop() + window.innerHeight + 1500); //1200 this value load befor ending scroll of postes

		if(bottom_of_element < bottom_of_screen && !$(elem).hasClass('no-data-found') && !$(elem).hasClass('loading')){

			$(elem).addClass('loading');

			var total_loaded_postes = $(elem + ' > .single-item-countable').length;

			var currentURL = $(location).attr('href'); 
    		var id = currentURL.substring(currentURL.lastIndexOf('/') + 1);

			$.ajax({
				type: 'get',
				url: url,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				},
				data: {
					offset:total_loaded_postes,
					id:id
				},
				success: function(response){

					$(elem).append(response);

					if(!response){
						$(elem).addClass('no-data-found');
					}

					$(elem).removeClass('loading');
				}
			});
		}
	}
	//End scroll and load data

	
	//Only for shorts
		function videoPlaytoggle(e){
			if($(e).hasClass('playing')){
				$(e).get(0).pause();
			}else{
				$(e).get(0).play();
			}
		}
		function onPause(e){
			if($(e).hasClass('playing')){
				$(e).removeClass('playing');
			}
		}
	//Only for shorts end

	//for All videos (on play event)
	function pauseOtherVideos(e){
		if($(e).hasClass('playing')){
			$(e).removeClass('playing');
		}
		setTimeout(function(){ $('.plyr-js.playing').trigger('pause'); }, 50);

		setTimeout(function(){ $('.plyr-js.playing').removeClass('playing'); }, 100);

		setTimeout(function(){ $(e).addClass('playing'); }, 200);
	}

	

function myMessageReact(react, requestType, messageId){
    $.ajax({
        type: 'post',
        url: '<?php echo e(url("/my_message_react")); ?>',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        data: {
            react:react,
            requestType:requestType,
            messageId:messageId
        },
        success: function(response){
            distributeServerResponse(response);
        }
    });
}
	

	

	//live search data from table
	function mySearchFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInputSearch");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		console.log(tr.length);
		for (i = 0; i < tr.length; i++) {
		  td = tr[i].getElementsByTagName("td")[0];
		  console.log(td);
		  if (td) {
			txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
			  tr[i].style.display = "";
			} else {
			  tr[i].style.display = "none";
			}
		  }       
		}
	  }

	//pause all stories playing video, when closed modal
	if($('#story-modal').height()){
		const storyModal = document.getElementById('story-modal')
		storyModal.addEventListener('hidden.bs.modal', event => {
			$('#story-modal video').trigger('pause');
		});
	}

	function toggleRightSideBar(){
		$('#sidebarToggle').toggleClass('transform-0');
	}

	$(document).ready(function(){
		rightSideBarToggler($(window).width());
		$(window).resize(function(){
			rightSideBarToggler($(window).width());
		});
	});

	function rightSideBarToggler(windowWidth){
		$('.sidebar.sidebarToggle.d-hidden').removeClass('d-hidden');
		if(windowWidth <= 985){
			$(".rightSideBarToggler").removeClass('d-hidden');
			$('.sidebar.sidebarToggle:not(transform-0)').addClass('transform-0');
		}else{
			$(".rightSideBarToggler:not(d-hidden)").addClass('d-hidden');
			$('.sidebar.sidebarToggle:not(d-hidden)').removeClass('transform-0');
		}
	}

	function resizeIframe(obj) {
		obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
	}

</script>
<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/common_scripts.blade.php ENDPATH**/ ?>