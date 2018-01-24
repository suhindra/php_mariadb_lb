// jQuery.fx.off = true;
jQuery(window).load(function(){

	cache = [];
	slider_container_height = 0;

	initSlider = function(selector) {
	
		/*
		jQuery(selector).owlCarousel({
			items: 1,
			loop: true,
			// singleItem: true,
			nav: false,
			dots: false,
			// autoHeight:true,
			height: 400
		});
		*/
		
		$(selector).responsiveSlides({
			auto: false,             // Boolean: Animate automatically, true or false
			speed: 500,            // Integer: Speed of the transition, in milliseconds
			timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
			pager: false,           // Boolean: Show pager, true or false
			nav: true,             // Boolean: Show navigation, true or false
			random: false,          // Boolean: Randomize the order of the slides, true or false
			pause: false,           // Boolean: Pause on hover, true or false
			pauseControls: true,    // Boolean: Pause when hovering controls, true or false
			prevText: "Previous",   // String: Text for the "previous" button
			nextText: "Next",       // String: Text for the "next" button
			maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
			navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
			manualControls: "",     // Selector: Declare custom pager navigation
			namespace: "rslides",   // String: Change the default namespace used
			before: function(){},   // Function: Before callback
			after: function(){}     // Function: After callback
		});
	}
	
	buildSlider = function(data) {

		var html = false;
	
		if (data) {
			html = '<h4 class="album-name text-center">'+data.title+'</h4>';
			
			// while photos
			if(jQuery(data.photos).size()) {
				// html += '<div class="preloader4"></div>';
				html += '<div class="wrap-slider"><div class="photos-container">';
				$.each(data.photos, function(i, photo){
					html += '<div><img class="replace-2x" src="'+photo+'" alt="" /></div>';
				});
				html += '</div></div>';
			}
			
			// Add info about alboms
			html += '<div class="additional-info row">\
								<div class="col-md-7">\
									<div class="heading">Description</div>\
									<div class="description">'+data.description+'</div>\
								</div>\
								<div class="col-md-5">\
									<div class="heading">Info</div>\
									<div class="adinfo-category"><strong>categories: </strong>'+data.category+'</div>\
									<div class="client"><strong>client: </strong>'+data.client+'</div>\
									<div class="link"><strong>link: </strong><a href="'+data.url+'">VISIT SITE</a></div>\
								</div>\
							</div>';
		}
		
		return html;
	}
	
	getNextID = function (current_element_id) {
		var nextAlbomID = false;
		if ((cache.length - 1) != current_element_id) {
			nextAlbomID = cache[current_element_id + 1];
		} else {
			nextAlbomID = cache[0];
		}
		return nextAlbomID;
	}
		
	getPrevID = function (current_element_id) {
		var prevAlbomID = false;
		if (current_element_id != 0) {
			prevAlbomID = cache[current_element_id - 1];
		} else {
			prevAlbomID = cache[cache.length - 1];
		}
		return prevAlbomID;
	}
	
	navigateAlboms = function() {
	
		$(".sliders a.prev").click(function() {
			var albom_id = $(this).data('albomid');
			
			var current_element_id = $.inArray(albom_id, cache);
			var nextAlbomID = getNextID(current_element_id);
			var prevAlbomID = getPrevID(current_element_id);
			
			create(albom_id, nextAlbomID, prevAlbomID);
			return false;
		});
		
		$(".sliders a.next").click(function() {
			var albom_id = $(this).data('albomid');
			
			var current_element_id = $.inArray(albom_id, cache);
			var nextAlbomID = getNextID(current_element_id);
			var prevAlbomID = getPrevID(current_element_id);

			create(albom_id, nextAlbomID, prevAlbomID);
			return false;
		});
		
		$("a.a-sliders-close").click(function() {
			$('.sliders .container').hide();
			destroy('#albom');
			$(".sliders").css('min-height', 0);
			return false;
		});
	}
	
	getJsonArray = function (elements, callback_success, callback_error) {
		$.getJSON('data.json', function(data) {
			
			for (index = 0; index < elements.length; ++index) {
				// buildAlbumSlider(elements[index], data[elements[index]]);
			}
			
			if (callback_success && typeof(callback_success) === "function") {
				callback_success(data);
			}
	    });
	}
	
	getJsonID = function (id, callback_success, callback_error) {
	
	    $.getJSON('data.json', function(data) {

			var d = data[id];
			if (callback_success && typeof(callback_success) === "function") {
				callback_success(d);
			}
	    });
	}
	
	destroy = function(selector){
		jQuery(selector).html("");
	}
	
	create = function(current_id, next_id, prev_id) {
		
		/* Fix height */
		$(".sliders").css('min-height', slider_container_height);
		
		$('.sliders .sliders-preloader').removeClass('loaded');
		
		$('.sliders .container').fadeOut({
			
			complete: function() {

				getJsonID(current_id, function(data){
					var html = buildSlider(data);

					jQuery(".sliders .container a.next").data('albomid', next_id);
					jQuery(".sliders .container a.prev").data('albomid', prev_id);
					
					jQuery("#albom").html(html);
							
					initSlider('.photos-container');
							
					$('.sliders .container').fadeIn({
						easing: 'swing',
						complete: function() {
							slider_container_height = $(".sliders .row .container").height();
							$('.sliders .sliders-preloader').addClass('loaded');
						}
					});
				});
			}
		});
	}
	
	jQuery('.element-item').click(function () {
	
		// Select current element ID
		var currentAlbomID = $(this).data('albumid');
		
		// ReInit after click
		cache = [];
		jQuery('.element-item:visible').each(function(index, element) {
		
			var AlbomID = $(element).data('albumid');
			cache.push(AlbomID);
		});

		var current_element_id = $.inArray(currentAlbomID, cache);
		var nextAlbomID = getNextID(current_element_id);
		var prevAlbomID = getPrevID(current_element_id);
		
		// Select next and preview IDS
		/*
		if ($(this).prev()) {
			var nextAlbomID = $(this).prev().data('albumid');s
		} else {
			var nextAlbomID = $(this).last().data('albumid');
		}
		
		if ($(this).next()) {
			var prevAlbomID = $(this).next().data('albumid');
		} else {
			var prevAlbomID = $(this).first().data('albumid');
		}
		*/
		
		// Get JSON
		create(currentAlbomID, nextAlbomID, prevAlbomID);

	});
	
	navigateAlboms();

});
