(function ($) {
    "use strict";

    // $('.js-example-basic-multiple').select2();
    // ClassicEditor
    // .create( document.querySelector( '#editor' ) )
    // .catch( error => {
    //     console.error( error );
    // } );




  

   
   
    $('.timeline-carousel').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            530: {
                items: 3,
            },
            768: {
                items: 4,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });

    $('.story-gallery').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        items: 1,
    });
    $('.st-child-gallery').owlCarousel({
        loop: false,
        margin: 10,
        dots: true,
        nav: false,
        items: 1,
    });
    $('.piv-gallery').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
       items: 1,
    });
    $('.group-carousel').owlCarousel({
        dots: false,
        nav: true,
        items: 1,
    });
    $('.rl-products').owlCarousel({
        loop: false,
        margin: 20,
        dots: false,
        nav: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            450: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
  /*   $('[data-autoresize]').forEach(function (element) {
        var offset = element.offsetHeight - element.clientHeight;
        element.addEventListener('input', function (event) {
            event.target.style.height = 'auto';
            event.target.style.height = event.target.scrollHeight + offset + 'px';
        });
    }); */
    // END: Auto resize textarea
    
        //FAQ Popup
        $('.video-popup').venobox();
        //niceselect
       // $('select').niceSelect();
    //    Time Picker
      let input = $('#event-time').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    var cta = $(".modal-footer .btn:not([type=submit])");
	cta.click(function(){
		var tab_id = $(this).attr('data-tab');

		cta.removeClass('current');
		$('.post-inner').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

    $(".post-inner span.close-btn").on("click", function() {
        $(".post-inner").removeClass('current');
    })
    
    

    return;
})(jQuery);
