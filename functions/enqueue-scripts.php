<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Adding scripts file in the footer
    //wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), hash_file('md5', get_template_directory() . '/assets/scripts/js'), true );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), hash_file('md5', get_template_directory() . '/assets/styles/scss'), 'all' );

     // Register main stylesheet
    wp_enqueue_style( 'add-css', get_template_directory_uri() . '/assets/styles/additional-style.css', array(), hash_file('md5', get_template_directory() . '/assets/styles/scss'), 'all' );


    // Register global header styles
    wp_enqueue_style( 'global-header-css', get_template_directory_uri() . '/global-header/global-header-styles.css', array(), hash_file('md5', get_template_directory() . '/global-header/global-header-styles.css'), 'all' );

    // FontAwesome
    wp_enqueue_style( 'fontawesome', 'https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css' );

   // Adding global header script
    wp_enqueue_script( 'global-header-js', get_template_directory_uri() . '/global-header/global-header-js.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );

    //wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), null, true);

    // Adding global header script
    // wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/scripts/jquery.countdown.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );


    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
