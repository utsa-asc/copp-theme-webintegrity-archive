<?php

//Disable tabindex for accessibility
add_filter( 'gform_tabindex', '__return_false' );
/***********************************************************************************************/
/* Advanced Custom Fields Theme Options Page */
/***********************************************************************************************/
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
               'position' => "55.3"
    ));

       acf_add_options_sub_page(array(
        'page_title'     => 'Theme Directory Settings',
        'menu_title'    => 'Directory',
        'parent_slug'    => 'theme-general-settings',
    ));

        acf_add_options_sub_page(array(
         'page_title'     => 'Department Options',
         'menu_title'    => 'Department Options',
         'parent_slug'    => 'theme-general-settings',
     ));

       acf_add_options_sub_page(array(
        'page_title'     => 'Header/Footer/Misc',
        'menu_title'    => 'Header/Footer/Misc',
        'parent_slug'    => 'theme-general-settings',
    ));

       acf_add_options_sub_page(array(
        'page_title'     => 'Google Analytics Options',
        'menu_title'    => 'Google Analytics',
        'parent_slug'    => 'theme-general-settings',
    ));

}
