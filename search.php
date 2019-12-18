<?php
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
//store the post type from the URL string
$post_type = $_GET['post_type'];
//check to see if there was a post type in the
//usrl string and if a results template for that
//post type actually exists
if( isset($post_type) && locate_template( 'search-' . $post_type . '.php' ) ) {
  //if so, load that template
  get_template_part('search', $post_type);

  // and then exit fann_descale_output
  exit;
}



get_header(); ?>

	<div class="content search">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<main class="main small-12 medium-8 large-8 cell" role="main">
				<header>
					<h1 class="archive-title"><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
				</header>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

			    <?php endif; ?>

		    </main> <!-- end #main -->

		    <?php get_sidebar('page'); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
