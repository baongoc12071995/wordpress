/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery( document ).ready( function( $ ){

    $('#customize-info .preview-notice').html('<a class="button button-primary" href="http://smartcatdesign.net/preview/zeal/" target="_BLANK">Upgrade to Zeal Pro</a>');
    $('#customize-info .preview-notice').append('<p style="color: #cc0000">The pro version includes a Frontpage Slider, more skin colors & font options, unique custom widgets & templates such as pricing tables, contact form, testimonials, FAQs, Events, services, news and more!</p>');

    $( '#customize-control-zeal_theme_color input[type=radio]' ).each( function() {

        var selector = $(this);

        if( selector.val()  === 'yellow' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #f1c40f"></span>')

        }

        if( selector.val()  === 'teal' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #3eb3b1"></span>')

        }

        if( selector.val()  === 'teal2' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #6EA085"></span>')

        }

        if( selector.val()  === 'purple' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #9A63B1"></span>')

        }

        if( selector.val()  === 'blue' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #6AD4EC"></span>')

        }

        if( selector.val()  === 'blue2' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #2980B9"></span>')

        }

        if( selector.val()  === 'green' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #A5D742"></span>')
        }

        if( selector.val()  === 'green2' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #2ECC71"></span>')
        }

        if( selector.val()  === 'orange' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #FAB429"></span>')

        }

        if( selector.val()  === 'pink' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #E64C66"></span>')

        }

        if( selector.val()  === 'pink2' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #FFCCF7"></span>')

        }

        if( selector.val()  === 'red' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #BD2828"></span>')

        }

    });

});