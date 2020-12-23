(function($) {
	"use strict";

$('.btn-account-login').on('click',function(){
    $('.modal-login').modal('show');
});

$('.cart-browse').on('click',function(){
    $('.cart-modal').modal('show');
});

$('#btn-add-address').on('click',function(){
    $('#address-modal').modal('show');
});


$('.category-list-item .nav-detail').click(function() {
  // e.preventDefault();
  // $('.category-list-item').not(this).find('ul').slideUp();
  $(this).next('ul').stop(true, true).slideToggle();
  return false;
});


  $('.store-categories').slick({
    infinite: false,
    // autoplay: true,
    slidesToShow: 9,
    slidesToScroll: 6,
    speed: 300,
    arrows: true,
    responsive: [
      {
        breakpoint: 1008,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      }
    ]
  });

$('.store-categories-inner').slick({
    infinite: true,
    autoplay: true,
    slidesToShow: 10,
    slidesToScroll: 6,
    speed: 3000,
    arrows: true,
  });

$('.product-image-slider').slick({
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    dots: true
  });

// $('#categories-dropdown').on('click',function(e){
//   e.preventDefault();
//   $('#categories-sublist').toggleClass('hide');
// });

// $('#brands-dropdown').on('click',function(e){
//   e.preventDefault();
//   $('#brands-sublist').toggleClass('hide');
// });

$('.close-tooltip').on('click',function(){
    $('.location-tooltip').css('display','none');
});

$('#btn-inc').on('click',function(){
  var e = $(this).parent().find("input");
  e.val(parseInt(e.val())+1);
})
$('#btn-desc').on('click',function(){
  var e=$(this).parent().find("input");
  parseInt(e.val())>1&&e.val(parseInt(e.val())-1);
})

$(window).ready(function(){
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("site-nav").style.top = "60px";
    } else {
      document.getElementById("site-nav").style.top = "0";
    }
    prevScrollpos = currentScrollPos;
  }
})

// $('a[href*="#"]')
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .click(function(event) {
//     if (
//       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//       && 
//       location.hostname == this.hostname
//     ) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       if (target.length) {
//         event.preventDefault();
//         $('html, body').animate({
//           scrollTop: target.offset().top
//         }, 1000, function() {
//           var $target = $(target);
//           $target.focus();
//           if ($target.is(":focus")) {
//             return false;
//           } else {
//             $target.attr('tabindex','-1');
//             $target.focus();
//           };
//         });
//       }
//     }
//   });
  
jQuery.validator.addMethod('answercheck', function(value, element) {
			return this.optional(element) || /^\bcat\b$/.test(value)
		}, "type the correct answer -_-");
		// validate Login
		$(function() {
			$('#modal-login-inner').validate({
				rules: {
					phone: {
						required: true,
						minlength: 10
					}
				},
				messages: {
					phone: {
						required: "Phone number is required",
						minlength: "A valid phone number has 10 digits in it!"
					}
				},
				submitHandler: function(form) {
					$(form).ajaxSubmit({
						type: "POST",
						data: $(form).serialize(),
						url: "https://tbosmartmart.com/pos/",
						success: function() {
							$('#btn-login').attr('disabled','false');
							alert('True');
						},
						error: function() {
							
						}
					});
				}
			});
		});
		
		
		$('#btn-next').on('click',function(){
		    var number = document.getElementById("phone").value;
            if (number.length > 9){
                $('#phone-wrapper').css('display','none');
		        $('#otp-wrapper').css('display','flex');
            }
            
		});
		
		
})(jQuery);