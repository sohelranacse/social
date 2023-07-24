<script type="text/javascript">
	"use strict";
	function storyType(e, type){
        $('.file-type-story').removeClass('border');
        $('.text-type-story').removeClass('border');
        

        if(type == 'file-type-story'){
            $('.text-story-form').hide();
            $('.text-story-submit').hide();
            $('.file-story-form').show();
            $('.file-story-submit').show();
        }else{
            $('.file-story-form').hide();
            $('.file-story-submit').hide();
            $('.text-story-form').show();
            $('.text-story-submit').show();
        }
        $('.'+type).addClass('border');
    }

    function selectColor(color){
        $('.bg-color-input-field').val(color);
        $('.color-input-field').val('fff');
        $('.input-prev-text').css({backgroundColor: '#'+color});
        $('.input-prev-text').css({color: '#fff'});
    }

    function createStory(formClass){
        $('.'+formClass).submit();
    }

    function story_privacy(privacy, e){
        $('.story_privacy').val(privacy);
        $('#privacyDroupdownBtn').html($(e).html());
    }

    
	$(document).ready(function(){
		var owl = $('#storiesSection');
		owl.on('translate.owl.carousel', function(event) {
			var offSet = (event.item.count-1);
			loadStory(offSet);
		})

		function loadStory(offSet){
			var url = "<?php echo url('/stories'); ?>/"+offSet;
			$.ajax({
				type: 'get',
				url: url,
				success: function(response){
					if(response.length > 3){
						const myArray = response.split('<div class="devider"></div>');

						myArray.forEach(myFunction);
						 
						function myFunction(item, index) {
							if(item.length > 3){
								$('#storiesSection').owlCarousel().trigger('add.owl.carousel', [jQuery('<div class="owl-item">' + item + '</div>')]);
								$('#storiesSection').trigger('refresh.owl.carousel');
							}
						}
					}

				}
			});
		}
	});


	function loadStoryDetailsOnModal(story_id){
		$('#story-modal').modal('show');
		
		var url = "<?php echo url('/story_details'); ?>/"+story_id;
		$.ajax({
			type: 'get',
			url: url,
			success: function(response){
				if(response){
					$('#story-modal .modal-body').html(response);
				}
				$('.timeline-carousel').owlCarousel({
			        loop: false,
			        autoplay:false,
			        autoplayHoverPause:true,
			        margin: 0,
			        dots: false,
			        nav: true,
			        responsiveClass: true,
			        responsive: {
			        	0: {
			                items: 1,
			            },
			            300: {
			                items: 1,
			            },
			            400: {
			                items: 2,
			            },
			            550: {
			                items: 3,
			            },
			            600: {
			                items: 3,
			            },
			            1000: {
			                items: 3,
			            }
			        }
			    });

			    $('.story-gallery').owlCarousel({
			        loop: false,
			        autoplay:false,
			        autoplayHoverPause:true,
			        margin: 10,
			        dots: false,
			        nav: true,
			        items: 1,
			    });

			    $('.st-child-gallery').owlCarousel({
			        loop: true,
			        autoplay:true,
			        autoplayHoverPause:true,
			        margin: 10,
			        dots: true,
			        nav: false,
			        items: 1,
			    });
			}
		});
	}

	function loadSingleStoryDetailsOnModal(story_id, e){
		$('.story-entry.active').removeClass('active');
		$(e).addClass('active');
		
		var url = "<?php echo url('/single_story_details'); ?>/"+story_id;
		$.ajax({
			type: 'get',
			url: url,
			success: function(response){
				if(response){
					$('#stg-wrap-story-gallery').remove();
					$('#story-modal .modal-body').append(response);
				}

			    $('.story-gallery').owlCarousel({
			        loop: false,
			        video: true,
			        autoplay:false,
			        autoplayHoverPause:true,
			        margin: 10,
			        dots: false,
			        nav: true,
			        items: 1,
			    });

			    $('.st-child-gallery').owlCarousel({
			        loop: true,
			        video: true,
			        autoplay:true,
			        autoplayHoverPause:true,
			        margin: 10,
			        dots: true,
			        nav: false,
			        items: 1,
			    });
			}
		});
	}

	$(function(){
		$('#storiesSection').removeClass('invisible');
	});
</script>
