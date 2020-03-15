

(function($) {

	skel.breakpoints({
		xlarge:	'(max-width: 1680px)',
		large:	'(max-width: 1280px)',
		medium:	'(max-width: 980px)',
		small:	'(max-width: 736px)',
		xsmall:	'(max-width: 480px)'
	});

	

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$header = $('#header2');
			$scrolldown=$('#scrolldown');

			$scrolldown.css('animation','bounce infinte 2s');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Fix: IE.
			if (skel.vars.browser == 'ie')
				$body.addClass('is-ie');

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Scrolly.
			$('.scrolly').scrolly({
				speed: 1000,
				offset: $header.outerHeight() -1
			});

			//Header.

			$header.each( function() {

				var t = jQuery(this),
					button 	= t.find('.button');

				button.click(function(e) {

					t.toggleClass('hide');

					if ( t.hasClass('preview') ) {
						return true;
					} else {
						e.preventDefault();
					}

				});

			});
			
			

		// Menu.
			$('#menu')
				.append('<a href="#menu" class="close"></a>')
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'right'
				});
// Poptrox.
$window.on('load', function() {

	$('.columns').poptrox({
		onPopupClose: function() { $body.removeClass('is-covered'); },
		onPopupOpen: function() { $body.addClass('is-covered'); },
		baseZIndex: 10001,
		useBodyOverflow: false,
		usePopupCaption: true,
		usePopupEasyClose: true,
		usePopupNav:true,
		overlayColor: '#000000',
		overlayOpacity: 0.75,
		popupLoaderText: '',
		fadeSpeed: 500,
		usePopupDefaultStyling: false,
		windowMargin: (skel.breakpoint('small').active ? 5 : 50)
	});

});
		// Posts.
			var $posts = $('.post');

			$posts.each(function() {

				var $this = $(this),
					$image = $this.find('.image'), $img = $image.find('img'),
					x;

				// Set image.
					$image.css('background-image', 'url(' + $img.attr('src') + ')');

				// Set position.
					if (x = $img.data('position'))
						$image.css('background-position', x);
						$image.css('background-color','black');
						$image.css('background-size','contain');
						$image.css('animation','fadeIn 2s');
			});

	});

})(jQuery);