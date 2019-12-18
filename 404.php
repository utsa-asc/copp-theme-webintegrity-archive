<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option'); 
}

get_header(); ?>
    <div class="inner hero colored" style="background-image: url(<?php echo $image; ?>);">
            <div class="gradient">
                <div class="particles-light">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x">
                            <div class="cell">
                                <h1>Epic 404 - Article Not Found</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>			
	<div class="content">
            <div class="grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x text-center">
	
			<main class="main small-12 cell" role="main">

				<article class="content-not-found">
					<section class="entry-content">
						<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
	
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->
            </div>
	</div> <!-- end #content -->

<?php get_footer(); ?>