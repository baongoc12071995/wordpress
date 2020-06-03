/**
 * Contains various JS functions for the theme
 *
 */
( function( $ ) {
	var body = $( 'body' );
	var panelToggle = $( '.panel-toggle' );
	var panel = $( '.panel' );
	var toggleText = panelToggle.find( '.screen-reader-text' );
	var menu = $( '.site-navigation ul' );
	var links = menu.find( 'a' );
	var subMenus = menu.find( 'ul' );
	
	panelToggle.on( 'click', function( e ) {
		var $this = $( this );
		e.preventDefault();
		
		panel.toggleClass( 'expanded' ).resize();
		body.toggleClass( 'sidebar-open' );

		$this.toggleClass( 'toggle-on' );
		$this.attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');

		if ( panel.hasClass( 'expanded' ) ) {
			toggleText.text( 'Hide' );
		} else {
			toggleText.text( 'Show' );
		}
	} );
	
	function toggleFocus() {
		$( this ).parentsUntil( menu, 'li' ).toggleClass( 'focus' );
	}
	
	subMenus.each( function() {
		$( this ).parent().attr( 'aria-haspopup', 'true' );
	} );
	
	links.each( function() {
		$( this ).on( 'focus blur', toggleFocus );
	} );
} )( jQuery );