// JavaScript Document

$(document).ready(function(){

	// carousel on the homepage
	$(".slides").slick({
        lazyload: 'progressive',
		autoplay: true,
		infinite: true,
		arrows: false,
		dots: false,
		fade: true,
		autoplaySpeed: 6000,
		speed: 1000
	});

	// carousels on detail page
    var slickOpts = {
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyload: 'progressive',
        dots: false,
		fade: true,
        prevArrow: '.btn-prev',
        nextArrow: '.btn-next'
    };
    $('.photos div').slick(slickOpts);

	//Styling of the images on the sidebar of a content template
	$('.content aside img').each(function(){
		var alt = $(this).attr('alt');
		$(this).wrap('<div class="imgPlaceHolder"><div class="border">');
		if(alt!=""){
			$(this).after('<p>'+alt+'</p>');
		}
	});

	//on mobile click the offcanvas main navigation trigger
	$(document).on('click', '#offcanvas-menu', function(){
		if( $('.lang-menu').hasClass('show') ){
			$('.lang-menu').removeClass('show');
			setTimeout(function(){
				$('.main-menu').addClass('show');
			}, 500);
		} else {
			if( $('.main-menu').hasClass('show') ){
				$('.main-menu').removeClass('show');
			} else {
				$('.main-menu').addClass('show');
			}
		}

	});

	//on mobile click the offcanvas language trigger
	$(document).on('click', '#offcanvas-lang', function(){
		if( $('.main-menu').hasClass('show') ){
			$('.main-menu').removeClass('show');
			setTimeout(function(){
				$('.lang-menu').addClass('show');
			}, 500);
		} else {		
			if( $('.lang-menu').hasClass('show') ){
				$('.lang-menu').removeClass('show');
			} else {
				$('.lang-menu').addClass('show');
			}
		}
	});

});