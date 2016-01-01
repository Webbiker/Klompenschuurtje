// JavaScript Document

$(document).ready(function(){

	//Styling of the images on the sidebar of a content template
	$('.OneColumnLayout .sidebar IMG').each(function(){
		var alt = $(this).attr('alt');
		$(this).wrap('<div class="imgPlaceHolder">').before('<div class="mask"></div>');
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