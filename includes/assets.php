<?php
/**
 * Add the scripts we need on the site in the way the should be included
 * See: http://wp.smashingmagazine.com/2011/10/12/developers-guide-conflict-free-javascript-css-wordpress/
 *
 * @package required+ Foundation
 * @since 	required+ Foundation 0.1.0
 */

/**
 * Register javascript
 * @since  required+ Foundation 0.1.0
 * @return void
 */

function required_load_scripts() {

    wp_register_script(
        'modernizr-custom', //handle
        get_template_directory_uri() . '/javascripts/vendor/modernizr.js', //source
        null, //dependencies
        FOUNDATION_VERSION, //version
        false
    );

    wp_register_script(
        'fastclick', //handle
        get_template_directory_uri() . '/javascripts/vendor/fastclick.js', //source
        array( 'jquery' ), //dependencies
        FOUNDATION_VERSION, //version
	    true //run in footer
    );

	wp_register_script(
        'foundation', //handle
        get_template_directory_uri() . '/javascripts/foundation.min.js', //source
        array( 'jquery', 'fastclick' ), //dependencies
        FOUNDATION_VERSION, //version
	    true //run in footer
    );

	// offcanvas.js - depending on foundation.js
    wp_register_script(
        'offcanvas',
        get_template_directory_uri() . '/javascripts/jquery.offcanvas.js',
        array( 'foundation' ),
        FOUNDATION_VERSION,
        true
    );

    //theme.js – depending on foundation.js
    wp_register_script(
        'theme',
        get_template_directory_uri() . '/javascripts/theme.js',
        array(
            'foundation'
        ),
        required_get_theme_version(),
        true
	);

    // We need the modernizr script in the head
    wp_enqueue_script( 'modernizr-custom' );

    // Enable threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    // Offcanvas JS only loaded on offcanvas template
    if ( is_page_template( 'page-templates/off-canvas-page.php' ) ) {
        wp_enqueue_script( 'offcanvas' );
    }

    // Load our Javascript (all foundation scripts and the theme.js)
    wp_enqueue_script( 'theme' );

}
add_action( 'wp_enqueue_scripts', 'required_load_scripts' );

/**
 * Register the stylesheets
 * @since  required+ Foundation 1.1.0
 * @return void
 */
function required_load_styles() {

    wp_register_style(
        'style',
        get_template_directory_uri() . '/stylesheets/foundation.min.css',
        null,
        required_get_theme_version()
    );

    wp_register_style(
        'font-awesome',
        get_template_directory_uri() . '/stylesheets/font-awesome.min.css',
        array( 'style' ),
        FOUNDATION_VERSION
    );

    // Off Canvas Styles, only used on certain page templates
    wp_register_style(
        'offcanvas',
        get_template_directory_uri() . '/stylesheets/offcanvas.css',
        null,
        FOUNDATION_VERSION
    );

    // Offcanvas CSS & JS only loaded on offcanvas template
    if ( is_page_template( 'page-templates/off-canvas-page.php' ) ) {
        wp_enqueue_style( 'offcanvas' );
    }

    // Load our Stylesheets
    wp_enqueue_style( 'style' );
    wp_enqueue_style( 'font-awesome' );

}
add_action( 'wp_enqueue_scripts', 'required_load_styles' );