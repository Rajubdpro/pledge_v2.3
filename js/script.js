jQuery(document).ready(function($){
	
	
	
	
	
	forms('input');
	forms('textarea');
	
	
	$('.js_select_style').customSelect({customClass:'js_select_post'});
	//console.log('js_select_style');
	
	
	var setTimeoutVar = 3000;
	var isFocused = false;
	
	$('#loginform input').change(function(){
		setTimeoutVar = 10000;
		////console.log(' ak: ' + setTimeoutVar);
	});
	
	$('#loginform input').focus(function(){
		isFocused = true;
		setTimeoutVar = 5000;
		////console.log(' ak: ' + setTimeoutVar);
	});
	
	$('#loginform input').focusout(function(){
		isFocused = false;
	});
	
	$(".nav_in .desk li").hover( function() {
		$( this ).addClass( "intent" );
	});
	$(".nav_in .desk li").mouseout(function() {
		var this_target = $(this);
		
		setTimeout(function() {
			if(isFocused == false){
				this_target.removeClass( "intent" );
			}
		}, setTimeoutVar);
	});
	
	
	
	
	
	
	
	
	
	
	
	
	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				
				var target = $(this.hash);
				var headerHeight = 50;
				
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top - headerHeight
				}, 1000);
				return false;
			}
			}
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function slider(){
		var active = $('#slide_nav li.active');
		var index = $("#slide_nav li.active").index(active);
		
		var slide_count = $(".slides .slide").index();
		//console.log('this is an awesome = ' + index);
		
		$('#slide_nav li a').each(function() {
			$(this).removeAttr("href");
		});
		
		$("#slide_nav li a").click(function(e) {
			e.preventDefault();
			e.stopPropagation();
			var index = $("#slide_nav li a").index(this);
			//console.log('clicked '+ index);
			var slide_no = index + 1;
			
			
			move_slides(slide_no);
		});
		
		
		$(".arrow").click(function(e) {
			
			e.preventDefault();
			e.stopPropagation();
			//console.log('next_slide: ');
			//console.log('slide_count: ' + slide_count);
			
			var current_slide = 1 + $(".slides .slide.active").index();
			//console.log('current_slide: ' + current_slide);
			
			if($(this).hasClass('prev_slide')){
				var target_slide = current_slide - 1;
				//console.log('prev_slide');
			}
			if($(this).hasClass('next_slide')){
				var target_slide = current_slide + 1;
				//console.log('next_slide');
			}
			
			if(target_slide == 0){
				target_slide = slide_count + 1;
				//console.log('prev');
			}else if(target_slide > slide_count + 1){
				target_slide = 1;
				//console.log('last');
			}
			move_slides(target_slide);
		});
		
	};slider();
	
	function move_slides(slide_number){
		var count = 0;
		$('#slides .slide').each(function() {
			count++;
			
			$(this).removeClass("next");
			$(this).removeClass("prev");
			$(this).removeClass("active");
			
			if(count == slide_number){
				$(this).addClass("active");
				//console.log('found active');
			}else if(count < slide_number){
				$(this).addClass("prev");
				//console.log('found prev');
			}else if(count > slide_number){
				$(this).addClass("next");
				//console.log('found next');
			}else{
				//alert("this shouldn't happen");
			}
		});
		
		count = 0;
		$('#slide_nav li a').each(function() {
			count++;
			$(this).removeClass("active");
			
			if(count == slide_number){
				$(this).addClass("active");
			}
		});
		
	};
	
	/*--- CODE TO MAKE THE SLIDER ROTATE ---*/
	
	var slideCounter = 1;
	var numberOfSlides = $('div.slide').length;
	var sliderTimeout;
	
	function runner(numberOfSlides) {
		
		// move_slides(slideCounter);
		
		// if (slideCounter === numberOfSlides) {
		// 	slideCounter = 0;			
		// }
		// slideCounter++;
		
		var slide_count = $(".slides .slide").size() - 1;
		// console.log('var slide_count:' + slide_count);
		
		var current_slide = 1 + $(".slides .slide.active").index();
		// console.log('current_slide: ' + current_slide);
		
		var target_slide = current_slide + 1;
		// console.log('next_slide');
		
		if(target_slide == 0){
			target_slide = slide_count + 1;
			// console.log('prev');
		}else if(target_slide > slide_count + 1){
			target_slide = 1;
			// console.log('last');
		}
		move_slides(target_slide);
		
		
		sliderTimeout = setTimeout(function() {
			runner(numberOfSlides);
		}, 10000);
	}
	
	//wait 15 seconds for the first siled
	setTimeout(function() {
			runner(numberOfSlides);
	}, 10000);
	
	
	
	// $('.full-slider-wrapper').mouseover( function (event) {
	// 	clearTimeout(sliderTimeout);
	// });
	
	// $('.full-slider-wrapper').mouseleave( function (event) {
	// 	clearTimeout(sliderTimeout);
	// 	setTimeout(function() {
	// 		runner(numberOfSlides);
	// 	}, 2000);		
	// });
	
	/*--- END CODE TO MAKE THE SLIDER ROTATE ---*/
	
}); // END jQuery document ready function



function addtheclass(intent_class){
	$(this).addClass(intent_class);
	////console.log('added');
};
function removetheclass(intent_class){
	$(this).addClass(intent_class);
	////console.log('removed');
};





function forms(target){
	jQuery(target).focus(
		function () {
			$(this).parent().addClass('intent');
			$(this).parent().parent().addClass('intent_out');
		}
	);
	jQuery(target).focusout(
		function () {
			$(this).parent().removeClass('intent');
			$(this).parent().parent().removeClass('intent_out');
		}
	);
};



