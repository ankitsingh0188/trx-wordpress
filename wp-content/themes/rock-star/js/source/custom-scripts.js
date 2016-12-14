jQuery(window).load(function(){

/*******************PRELOADER*******************/

 jQuery('#loader').delay(100).fadeOut('slow');
 jQuery('#loader-container').delay(100).fadeOut('slow');
 jQuery('body').delay(100).css({'overflow-x':'hidden'});

/*******************END PRELOADER**************/

/*******************STICKY HEADER**************/

jQuery('document').ready(function() {
    //jQuery('.is-sticky').css({'padding-top': jQuery('#masthead').outerHeight()});
    jQuery('.blockhead').css({'height': jQuery('#masthead').outerHeight()-50});
});

jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 1) {
        jQuery(".header-bg").addClass("is-sticky");
    }
    else {
        jQuery(".header-bg").removeClass("is-sticky");
    }
});

/*********************END STICKY HEADER******************/
    //Load Menu
    /* global screenReaderText */
    /**
     * Theme functions file.
     *
     * Contains handlers for navigation and widget area.
     */

    ( function( $ ) {
        var body, masthead, menuToggle, siteNavigation, siteHeaderMenu, resizeTimer;

        function initMainNavigation( container ) {

            // Add dropdown toggle that displays child menu items.
            var dropdownToggle = $( '<button />', {
                'class': 'dropdown-toggle',
                'aria-expanded': false
            } ).append( $( '<span />', {
                'class': 'screen-reader-text',
                text: screenReaderText.expand
            } ) );

            container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

            // Toggle buttons and submenu items with active children menu items.
            container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
            container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

            // Add menu items with submenus to aria-haspopup="true".
            container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

            container.find( '.dropdown-toggle' ).click( function( e ) {
                var _this            = $( this ),
                    screenReaderSpan = _this.find( '.screen-reader-text' );

                e.preventDefault();
                _this.toggleClass( 'toggled-on' );
                _this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

                // jscs:disable
                _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
                // jscs:enable
                screenReaderSpan.text( screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
            } );
        }
        initMainNavigation( $( '.main-navigation' ) );

        masthead         = $( '#masthead' );
        menuToggle       = masthead.find( '#menu-toggle' );
        siteHeaderMenu   = masthead.find( '#site-header-menu' );
        siteNavigation   = masthead.find( '#site-navigation' );

        // Enable menuToggle.
        ( function() {

            // Return early if menuToggle is missing.
            if ( ! menuToggle.length ) {
                return;
            }

            // Add an initial values for the attribute.
            //menuToggle.add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', 'false' );

            menuToggle.on( 'click.rock-star', function() {
                $( this ).add( siteHeaderMenu ).toggleClass( 'toggled-on' );

                // jscs:disable
                //$( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
                // jscs:enable
            } );
        } )();

        // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
        ( function() {
            if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
                return;
            }

            // Toggle `focus` class to allow submenu access on tablets.
            function toggleFocusClassTouchScreen() {
                if ( window.innerWidth >= 910 ) {
                    $( document.body ).on( 'touchstart.rock-star', function( e ) {
                        if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
                            $( '.main-navigation li' ).removeClass( 'focus' );
                        }
                    } );
                    siteNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.rock-star', function( e ) {
                        var el = $( this ).parent( 'li' );

                        if ( ! el.hasClass( 'focus' ) ) {
                            e.preventDefault();
                            el.toggleClass( 'focus' );
                            el.siblings( '.focus' ).removeClass( 'focus' );
                        }
                    } );
                } else {
                    siteNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.rock-star' );
                }
            }

            if ( 'ontouchstart' in window ) {
                $( window ).on( 'resize.rock-star', toggleFocusClassTouchScreen );
                toggleFocusClassTouchScreen();
            }

            siteNavigation.find( 'a' ).on( 'focus.rock-star blur.rock-star', function() {
                $( this ).parents( '.menu-item' ).toggleClass( 'focus' );
            } );
        } )();

        // Add the default ARIA attributes for the menu toggle and the navigations.
        function onResizeARIA() {
            if ( window.innerWidth < 910 ) {
                if ( menuToggle.hasClass( 'toggled-on' ) ) {
                    menuToggle.attr( 'aria-expanded', 'true' );
                } else {
                    menuToggle.attr( 'aria-expanded', 'false' );
                }

                if ( siteHeaderMenu.hasClass( 'toggled-on' ) ) {
                    siteNavigation.attr( 'aria-expanded', 'true' );
                    //socialNavigation.attr( 'aria-expanded', 'true' );
                } else {
                    siteNavigation.attr( 'aria-expanded', 'false' );
                    //socialNavigation.attr( 'aria-expanded', 'false' );
                }

                menuToggle.attr( 'aria-controls', 'site-navigation social-navigation' );
            } else {
                menuToggle.removeAttr( 'aria-expanded' );
                siteNavigation.removeAttr( 'aria-expanded' );
                //socialNavigation.removeAttr( 'aria-expanded' );
                menuToggle.removeAttr( 'aria-controls' );
            }
        }

    } )( jQuery );

    jQuery( "section.widget" ).each(function() {
        custom_background = jQuery( this ).find('.widget-background').attr('data-background');
        if( '' != custom_background ){
            jQuery( this ).css('background-image', 'url('+custom_background+')');
            jQuery( this ).css('background-position', '50% 50%');
        }
    });

});
/**************END JQUERY***************************/