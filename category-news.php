<?php
/**
 * The category news template
 *
 * This is the most generic template file for posts
 *
 */

get_header(); ?>
	<div class="inner hero colored category-news" style="background-image: url(<?php the_field('banner_image', 'option'); ?>);">
      <div class="gradient">
              <div class="grid-container">
                  <div class="grid-x grid-margin-x text-center">
                      <div class="cell">
                          <div class='h1'>News</div>
                      </div>
                  </div>
              </div>
      </div>
  </div>
	<section class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="small-12 cell">
				<?php utsa_breadcrumb(); ?>
			</div>
		</div>
	</section>
	<section class="grid-container ">
		<div class="grid-x grid-margin-x grid-padding-x">
				<div class="small-12 cell">
						<div class='h2 fancy-header'>News</div>
				</div>
		</div>
	</section>
	<div class="grid-container ">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

		    <main class="main small-12 large-9 cell" role="main">

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

        <div class="small-12 large-3 cell">
            <div class="default-page-sidebar">
                <?php dynamic_sidebar( 'news' ); ?>
            </div>
        </div>
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
