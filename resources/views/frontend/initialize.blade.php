
<script type="text/javascript">
	"use strict";

	$(document).ready(function(){
		
		@yield('specific_code_niceselect')
		@yield('custom_js_code_for_page')

		//Tooltip initialize
		$("[data-bs-toggle=tooltip]").tooltip();

		  
		//on enter key submit jquery
		$('.submit_on_enter').keydown(function(event) {
			// enter has keyCode = 13, change it if you want to use another button
			if (event.keyCode == 13) {
			  this.form.submit();
			  return false;
			}
		  });

		$('.custom-modal-overlay:not(.alert-modal), .custom-modal-closed:not(.alert-modal)').on('click', function(){
		//$('.custom-modal-overlay, .custom-modal-closed, .alert-cancel-btn, #alertContinueLink').on('click', function(){
			//Post Previe restore
			if (typeof restorePostView === "function") {
			    restorePostView();
			}
			
			$('.custom-modal:not(.alert-modal)').removeClass('custom-modal-show');
			var modalSpinner = '<div class="custom-modal-body-loader"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
			$('#customModalBody:not(.alert-modal)').html(modalSpinner);
		});

		$('.custom-modal-overlay, .custom-modal-closed.alert-modal, .alert-cancel-btn, #alertContinueLink').on('click', function(){
			$('.alert-modal.custom-modal').removeClass('custom-modal-show');
		});



		//Multiple plyr initialize with .plyr-js class
		const players = Array.from(document.querySelectorAll('.plyr-js:not(.initialized)')).map(p => new Plyr(p, {
		    clickToPlay: true,
		 }));


		//Photo gallery

		if(document.querySelector(".photoGallery:not(.initialized")){
			var galleryWindowWidth = $('.photoGallery').width();
			if((galleryWindowWidth/4) < 90){
				var rowHeight = 90;
			}else{
				var rowHeight = galleryWindowWidth/5;
			}
			$(".photoGallery:not(.initialized)").justifiedGallery({
				rowHeight : rowHeight,
				lastRow : 'justify',
				margins : 2,
			});
		}
		
		$('.content:not(.initialized)').summernote({
            height: '250px',
            toolbar: [
                ['color', ['color']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol']],
                ['table', ['table']],
                ['insert', ['link']]
            ]
        });
		
		
	});
	

	//Ajax for submission start
	$('.ajaxForm:not(.initialized)').ajaxForm({
		
		beforeSend: function(data, form) {
			$('.custom-progress-bar .custom-progress').width('0%');
			$('.custom-progress-bar').show();
		},
		uploadProgress: function(event, position, total, percentComplete) {
			$('.custom-progress-bar .custom-progress').width(percentComplete+'%');
			console.log(percentComplete)
			if(percentComplete >= 100){
				$('.ajaxForm .submitted:not(.no-processing)').html("{{get_phrase('Processing')}}..");
			}
		},
		complete: function(xhr) {
			setTimeout(function(){

				distributeServerResponse(xhr.responseText);

				$('.custom-progress-bar').hide();
				
				$('.ajaxForm .submitted').html($('.ajaxForm .submitted').attr("title"));
				$('.ajaxForm .submitted').attr('disabled', false);
			}, 400);
		},
		error: function(e)
		{
			console.log(e);
		}
	});

	//Add submitted class to submit button while submit the ajax form
	$('.ajaxForm').on('submit', function(event){
		$('form .submitted').removeClass('submitted');
		$(this).find(':submit').addClass('submitted');
		$(this).find(':submit').attr('title', $(this).find(':submit').html());
		$(this).find(':submit:not(.no-uploading)').html("{{get_phrase('Uploading')}}..");
		$(this).find(':submit').attr('disabled', true);
	});
	//End ajax form submission



	//Add initialized for checking which elements has already initialized
	$(function(){
		setTimeout(function(){
			$('.ajaxForm:not(.initialized)').addClass('initialized');
			$('.input-images:not(.initialized)').addClass('initialized');
			$('.input-images-and-videos:not(.initialized)').addClass('initialized');
			$('.plyr-js:not(.initialized)').addClass('initialized');

			$('.photoGallery:not(.initialized)').addClass('initialized');
			$('.photoGallery').removeClass('visibility-hidden');
			
			$('.content:not(.initialized)').addClass('initialized');
		}, 200);	
	});


	//blog search key up
	$("#searchblogfield").keyup(function(){
		let value= $(this).val();
		$.ajax({
			type : 'get',
			url : '{{URL::to('/blog/search/')}}',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			},
			data:{'search':value},
			success:function(response){
				$('#searchblogviewsection').html(response);
			}
		});
	});


	//Cancel the anchor-scrolling when click
	$('a[href="#"]').on('click', function(event){
		event.preventDefault();
	});

	
</script>

@yield('custom_js_code_for_chat')
