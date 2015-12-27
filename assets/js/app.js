// JavaScript Document

$(document).ready(function(){
	//jQuery Cycle Carrousel on the homepage
	// $('.slides').cycle({
	// 	fx: 'fade',
	// 	pause: 1,
	// 	timeout: 6000
	// });

	// //jQuery Cycle Carrousel on detailpage
	// $('.detailfotos UL').cycle({
	// 	fx: 'fade',
	// 	timeout: 0,
	// 	next: "#next"
	// });

	//Styling of the images on the sidebar of a content template
	$('.OneColumnLayout .sidebar IMG').each(function(){
		var alt = $(this).attr('alt');
		$(this).wrap('<div class="imgPlaceHolder">').before('<div class="mask"></div>');
		if(alt!=""){
			$(this).after('<p>'+alt+'</p>');
		}
	});


	// //remove bullit after last menu item
	// $('UL.navigation LI.last').next().remove();

	// //add a class to all odd LI's in the Overview UL
	// $('UL.overview LI:even').addClass('margin');

});