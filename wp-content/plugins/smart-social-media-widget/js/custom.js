//JavaScript for Smart Social Media Widget
jQuery( document ).ready(function( $ ) {

	//Toggle options for different styles
	$( '.ssmw-radio').on( "click", function() {
		if( $(this).val() == 'simple' ) {
			$('.ssmw-align').show();
			$('.ssmw-rows').show();
			$('.ssmw-color').show();
		} else if ( $(this).val() == 'boxed' ) {
			$('.ssmw-align').hide();
			$('.ssmw-rows').hide();
			$('.ssmw-color').hide();
		}
	});


	$( '.ssmw-dropdown-button' ).on( "click", function() {

		var toggle = $( this ).children( 'span' );
		$( this ).next().slideToggle();

		//Toggle arrow
		if( toggle.hasClass( 'ssmw-closed' ) ) {
			toggle.removeClass('ssmw-closed');
			toggle.addClass('ssmw-opened');
		} else {
			toggle.removeClass('ssmw-opened');
			toggle.addClass('ssmw-closed');
		}
	});

	//When save is clicked in widget.php
	jQuery(document).on('widget-updated', function( e, widget){


		$( '.ssmw-radio').on( "click", function() {
			if( $(this).val() == 'simple' ) {
				$('.ssmw-align').show();
				$('.ssmw-rows').show();
				$('.ssmw-color').show();
			} else if ( $(this).val() == 'boxed' ) {
				$('.ssmw-align').hide();
				$('.ssmw-rows').hide();
				$('.ssmw-color').hide();
			}

		});


		$( '.ssmw-dropdown-button' ).on( "click", function() {

			var toggle = $( this ).children( 'span' );
			$( this ).next().slideToggle();

			if( toggle.hasClass( 'ssmw-closed' ) ) {
				toggle.removeClass('ssmw-closed');
				toggle.addClass('ssmw-opened');
			} else {
				toggle.removeClass('ssmw-opened');
				toggle.addClass('ssmw-closed');
			}
		});



	});

});


