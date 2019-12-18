<?php

/***********************************************************************************************/
/* Move Yoast To The Bottom */
/***********************************************************************************************/
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/***********************************************************************************************/
/* Get Posts */
/***********************************************************************************************/

function newsPosts() {
	$args = array(
            'posts_per_page' => 3,
            'category_name' => 'news',
            );
	return get_posts( $args );
}

function featuredPost() {
	$args = array(
            'posts_per_page' => 1,
            'category_name' => 'featured'

            );
	return get_posts( $args );
}

function eventPost() {
	$args = array(
            'posts_per_page' => -1,
            'post_type' => 'events',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            );
	return get_posts( $args );
}


function add_post_news_template( $single_template )
{
	$object = get_queried_object();
	$single_post_news_template = locate_template("single-category-news.php");
	if( in_category('news') )
	{
		return $single_post_news_template;
	} else {
		return $single_template;
	}
}
add_filter( 'single_template', 'add_post_news_template', 10, 1 );

/***********************************************************************************************/
/* Edit Archive Title */
/***********************************************************************************************/

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        } elseif ( is_tax('product_categories') ) {
            $title = single_term_title( '', false );
        }
    return $title;

});

/***********************************************************************************************/
/* Gravity Forms */
/***********************************************************************************************/

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/***********************************************************************************************/
/*   */
/***********************************************************************************************/

// custom excerpt length
function themify_custom_excerpt_length( $length ) {
   return 20;
}
add_filter( 'excerpt_length', 'themify_custom_excerpt_length', 999 );

// add more link to excerpt
function themify_custom_excerpt_more($more) {
   global $post;
   return '<a class="more-link" href="'. get_permalink($post->ID) . '">'. __('Read More', 'themify') .'</a>';
}
add_filter('excerpt_more', 'themify_custom_excerpt_more');


/***********************************************************************************************/
/* Dashboard Widget */
/***********************************************************************************************/

// Function that outputs the contents of the dashboard widget
function dashboard_widget_function( $post, $callback_args ) {
	echo "<strong>\"fancy-header\"</strong><br>";
	echo "Add the orange and grey line above a header<br><br>";

	echo "<strong>\"checklist\"</strong><br>";
	echo "Gives an unordered list checkmarks instead of bullets<br>";
}

// Function used in the action hook
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'CSS Classes', 'dashboard_widget_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );

/***********************************************************************************************/
/* Expire Past Events */
/***********************************************************************************************/


// expire offer posts on date field.
if (!wp_next_scheduled('expire_events')){
  wp_schedule_event(time(), 'hourly', 'expire_events'); // this can be hourly, twicedaily, or daily
}

add_action('expire_events', 'expire_posts_function');

function expire_posts_function() {
	$today = date('Y-m-d H:i:s');
	$args = array(
		'post_type' => array('events'), // post types you want to check
		'posts_per_page' => -1
	);
	$posts = get_posts($args);
	foreach($posts as $p){
		$expiredate = get_field('event_date', $p->ID, false, false); // get the raw date from the db
		if ($expiredate) {
			if($expiredate < $today){
				$postdata = array(
					'ID' => $p->ID,
					'post_status' => 'private'
				);
				wp_update_post($postdata);
			}
		}
	}
}
