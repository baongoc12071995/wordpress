/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */


( function( $ ) {
    
    

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.header-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.header-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

        // ---------------------------------------------------------------------
        // HERO BANNER ---------------------------------------------------------
        // ---------------------------------------------------------------------
        
        // Use Image or Colour for Background?
        wp.customize( 'zeal_hero_background_style', function( value ) {
		value.bind( function( to ) {
                    
                        if ( to === 'image' ) {
                            $( 'section.front-page-hero div.hero-banner' ).removeClass( 'zeal-bg-img-none' );
                        } else {
                            $( 'section.front-page-hero div.hero-banner' ).addClass( 'zeal-bg-img-none' );
                        }
                        
		} );
	} );
        
        // Hero Background Image
	wp.customize( 'zeal_hero_image', function( value ) {
		value.bind( function( to ) {
			$( '.hero-banner' ).css( 'background-image', 'url(\'' + to + '\')' );
		} );
	} );
        
        // Hero Background Color
	wp.customize( 'zeal_hero_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.hero-banner' ).css( 'background-color', to );
		} );
	} );
        
        // Hero Tint / Filter Toggle Switch
        wp.customize( 'zeal_hero_tint_toggle', function( value ) {
		value.bind( function( to ) {
                    
                        if ( to === 'on' ) {
                            $( '.hero-overlay' ).removeClass( 'zeal-bg-none' );
                        } else {
                            $( '.hero-overlay' ).addClass( 'zeal-bg-none' );
                        }
                        
		} );
	} );
        
        // Hero Tint / Filter Color
	wp.customize( 'zeal_hero_tint', function( value ) {
		value.bind( function( to ) {
                    
                    to = to.replace('#','');
                    r = parseInt(to.substring(0,2), 16);
                    g = parseInt(to.substring(2,4), 16);
                    b = parseInt(to.substring(4,6), 16);

                    to = 'rgba('+r+','+g+','+b+','+.25+')';

                    $( '.hero-overlay' ).css( 'background-color', to );
                        
		} );
	} );
        
        // Hero Banner Heading Text
        wp.customize( 'zeal_hero_heading', function( value ) {
		value.bind( function( to ) {
			$( '.hero-overlay h2' ).text( to );
		} );
	} );
        
        // Hero Banner Heading Font Size
        wp.customize( 'zeal_hero_heading_size', function( value ) {
		value.bind( function( to ) {
                    $( '.hero-overlay h2' ).css( 'font-size', to + 'px' );
		} );
	} );

        // Hero Banner Tagline Text
        wp.customize( 'zeal_hero_tagline', function( value ) {
		value.bind( function( to ) {
			$( '.hero-overlay p.site-tagline' ).text( to );
		} );
	} );
        
        // Hero Banner Tagline Font Size
        wp.customize( 'zeal_hero_tagline_size', function( value ) {
		value.bind( function( to ) {
                    $( '.hero-overlay p.site-tagline' ).css( 'font-size', to + 'px' );
		} );
	} );
    
        // Hero Button 1 Text
        wp.customize( 'zeal_hero_button_1_text', function( value ) {
                value.bind( function( to ) {
                        $( '.hero-button-1' ).text( to );
                } );
        } );

        // Hero Button 1 External URL
        wp.customize( 'zeal_hero_button_1_url', function( value ) {
                value.bind( function( to ) {
                        $( 'div.big-hero-buttons a:first-child' ).attr( 'href', to );
                } );
        } );

        // Hero Button 2 Text
        wp.customize( 'zeal_hero_button_2_text', function( value ) {
                value.bind( function( to ) {
                        $( 'button.hero-button-2' ).text( to );
                } );
        } );

        // Hero Button 2 External URL
        wp.customize( 'zeal_hero_button_2_url', function( value ) {
                value.bind( function( to ) {
                        $( 'div.big-hero-buttons a:last-child' ).attr( 'href', to );
                } );
        } );
    
    
        // ---------------------------------------------------------------------
        // PORTFOLIO SECTION ---------------------------------------------------
        // ---------------------------------------------------------------------
        
        // CTA Primary Heading
        wp.customize( 'cta_heading', function( value ) {
                value.bind( function( to ) {
                        $( 'div.cta-banner-content h3' ).text( to );
                } );
        } );
        
        // CTA Secondary Heading
        wp.customize( 'cta_subheading', function( value ) {
                value.bind( function( to ) {
                        $( 'div.cta-banner-content p' ).text( to );
                } );
        } );

        // CTA Click-Through Link URL
        wp.customize( 'cta_link', function( value ) {
                value.bind( function( to ) {
                        $( 'div.cta-banner-content a' ).attr( 'href', to );
                } );
        } );
    
    
    
        // ---------------------------------------------------------------------
        // PORTFOLIO SECTION ---------------------------------------------------
        // ---------------------------------------------------------------------
        
        // Portfolio Section Heading Text
        wp.customize( 'zeal_portfolio_section_name', function( value ) {
		value.bind( function( to ) {
			$( 'h2.feature-content-title' ).text( to );
		} );
	} );
        
    
        // ---------------------------------------------------------------------
        // SINGLE POST ---------------------------------------------------------
        // ---------------------------------------------------------------------
        
        // Single Post Column Width
        wp.customize( 'zeal_post_column_ratio', function( value ) {
		value.bind( function( to ) {

                    // Use the ratio keyword to swap out the col-sm-* on 
                    // the left and right columns appropriately
                    
                    switch ( to ) {
                        
                        case 'three-nine':
                            
                            $( 'div.single-post-left' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-3');
                            
                            $( 'div.single-post-right' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-9');
                            
                            break;
                            
                        case 'four-eight':
                            
                            $( 'div.single-post-left' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-4');
                            
                            $( 'div.single-post-right' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-8');
                            
                            break;
                            
                        case 'six-six':
                            
                            $( 'div.single-post-left' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-6');
                            
                            $( 'div.single-post-right' ).removeClass (function (index, css) {
                                return (css.match (/(^|\s)col-sm-\S+/g) || []).join(' ');
                            }).addClass('col-sm-6');
                            
                            break;
                        
                    }
                    
                    // Once the new column widths are set, adjust the height of
                    // the columns again to match and make a uniform bottom edge
                    
                    var left_height     = $( 'div.single-post-left' ).css( 'height' );
                    var right_height    = $( 'div.single-post-right' ).css( 'height' );
                    
                    left_height = parseInt(left_height.slice(0, -2));
                    right_height = parseInt(right_height.slice(0, -2));

                    if ( left_height > right_height ) {
                        $( 'div.single-post-right' ).css( 'height', left_height + 'px' );
                    } else {
                        $( 'div.single-post-left' ).css( 'height', right_height + 'px' );
                    }
                    
		} );
	} );
    
} )( jQuery );
