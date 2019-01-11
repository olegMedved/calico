$(document).ready(function () {

var container =  '.filter-area .grid'; 

	$(window).on('load',  function(e){	
		var $grid = $(container ).isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
		  columnWidth: '.grid-sizer'
		}
	}); 


	
 
	 
	 var dataPP = parseInt($('.show-more	').attr('data-pp'));
 
	$('.show-more	').click(function(e){	

		e.preventDefault()	 ;
		var size = $('.grid-item ').size()
		var obj = $(this)
		var post_id = obj.attr('data-post_id')
		var all = obj.attr('data-all')
		console.log(size)
		$.ajax({
			url:global.url,
			data: {
				action:'ajax_gallery',
				offset: size,
				post_id: post_id,
				all : all
			},
			success: function(data) {
				var $datas = $(data)
			
 
				     setTimeout(function(){
				 	 	$(container).append($datas)  
							$(container).isotope( 'appended', $datas);
							
							$grid.imagesLoaded().progress( function() {
							$grid.isotope('layout');
						});
						
							$(".fancybox").fancybox({ });

					}, 200)	
			 
 
				
				var total = obj.attr('data-count');
				var size = $('.grid-item ').size()
				if (size >= total)
					obj.remove()
			}
		})
	 
 
	});
	
}); 
		
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	   //	if ( '123' == event.detail.contactFormId )
	    $('.success-popup').click()
	}, false );
/*
	$('.grid').masonry({
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		percentPosition: true
	});*/



	$('.top-slider .slider').owlCarousel({
		items:1,
		nav:true,
		dots:false,
		loop:true
	});

	$('.testimonials .slider').owlCarousel({
		items:1,
		nav:true,
		dots:false
	});
	$('.btn-default').hover(function () {
		$('.btn-default-pseudo').toggleClass('btn-default-pseudo-hover')
	});



	$('.text-long').dotdotdot({
		height: 90
	});
	$(".fancybox").fancybox({

	});



	$('select').niceSelect();

	$('.top-menu a').click(function (e) {
		e.stopPropagation();
		$(this).toggleClass('top-menu-hover');
		$('.sub-menu').toggleClass('sub-menu-hover');
		$('.header .top-menu > a span').toggleClass('menu-hover')
	});

	// $('#menu-item-72026').on('click', function () {
	// 	$('.sub-menu .sub-menu').toggleClass('display-block');
	// });
  $('#menu-item-72026').on('click', function () {
  	$("#menu-item-72026 .sub-menu").each(function() {
    	if ($(this).is(":visible")) {
    		$(this).hide();
    	} else {
      	$(this).show();
    	}
  	});
  });

	$('.top-menu .sub-menu').click(function(e){
		e.stopPropagation();
	});
	$('html,body').click(function(){
		$('.sub-menu').removeClass('sub-menu-hover');
		$('.top-menu a').removeClass('top-menu-hover');
		$('.header .top-menu > a span').removeClass('menu-hover')
	});


});