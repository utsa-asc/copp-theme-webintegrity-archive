<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>
	<div class="inner hero colored template-index" style="background-image: url(<?php the_field('banner_image', 'option'); ?>);">
            <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x text-center">
                            <div class="cell">
                                <div class='h1'>Blog</div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
	<div class="grid-container content ">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

		    <main class="main small-12 cell" role="main">

			    <?php if (have_posts()) : while (have_posts()) : the_post();?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>

				<?php endwhile; ?>
				<div class='pagination text-center'>
					<?php joints_page_navi(); ?>
				</div>
				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

		    </main> <!-- end #main -->


		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
