jQuery(function($) {

    var wow = new WOW({
        offset: 100
    });
    wow.init();

    $(function(){
        
        $('#primary-menu').slicknav({
            prependTo: 'nav.main-nav'
        });
        
    });
    

    $(window).load( function() {
        
        var left_height     = $( 'div.single-post-left' ).css( 'height' );
        var right_height    = $( 'div.single-post-right' ).css( 'height' );
        
        if ( typeof left_height !== 'undefined' && typeof right_height !== 'undefined' ) {
        
            left_height = parseInt(left_height.slice(0, -2));
            right_height = parseInt(right_height.slice(0, -2));

            if ( left_height > right_height ) {
                $( 'div.single-post-right' ).css( 'height', left_height + 'px' );
            } else {
                $( 'div.single-post-left' ).css( 'height', right_height + 'px' );
            }
            
        }
        
    });

});

jQuery(document).ready( function ($) {
    
    // scroll to top trigger
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });
    
    $('.zeal-search, #zeal-search .fa.fa-close').click(function () {

        $('#zeal-search').fadeToggle(500);
        $('.search-field').focus();

    });
    
    $(window).resize( function () {
//        rebuild_featured_posts();
    })
    
    if( $(window).width() < 768 ) {
        rebuild_featured_posts();
    }
    
    function rebuild_featured_posts() {
        
        $('.featured-homepage-post').each( function () {
            
            var item = $('.featured-post-content', $( this ) ).html();
            item = '<div class="col-sm-6 featured-post-content">' + item + '</div>';
           
           $( '.featured-post-content', $( this ) ).remove();
           
           $(this).append( item );           
        });
        
        
    }
    
    $.stellar({
        horizontalScrolling: false,
        verticalOffset: 40
    });
    
    // -----------
    // Contact Form
    $('#zeal-contact-form').submit( function (e) {
       
        e.preventDefault();
        
        $('.mail-sent,.mail-not-sent').hide();
       
        var form = $(this);
        var name = $('.name', form ).val();
        var email = $('.email', form ).val();
        var message = $('.message', form ).val();
        var url = form.attr('action');
        
        if( name.length < 2 ) {
            alert( 'Please enter a name' );
            return false;
        }
        
        if( message.length < 2 ) {
            alert( 'Please enter a message' );
            return false;
        }
        
        if( ! zealValidateEmail( email ) ) {
            alert( 'Please enter a valid email address' );
            return false;
        }
        
        var data = {
            
            action : 'zeal_send_message',
            name : name,
            email : email,
            message : message
            
        }
        
        $.post( url, data, function ( response ) {
           console.log( response );
            if( response == 1 ) {
                $('.mail-sent').fadeIn(350);
                form[0].reset();
                
            }else{
                $('.mail-not-sent').fadeIn(350);
            }
            
        });
        
        
    });
    
    function zealValidateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
});