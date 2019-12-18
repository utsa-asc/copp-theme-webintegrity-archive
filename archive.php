<?php
/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

?>

	<div class="inner hero colored template-archive" style="background-image: url(<?php the_field('banner_image', 'option'); ?>);">
      <div class="gradient">
          <div class="particles-light">
              <div class="grid-container">
                  <div class="grid-x grid-margin-x">
                      <div class="cell">
                          <h1><?php the_archive_title();?></h1>
                      </div>
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
						<div class='h2 fancy-header'></div>
				</div>
		</div>
	</section>
	<div class="">
            <div class="grid-container">
                <div class='grid-x grid-margin-x grid-padding-x'>
                    <div class="inner-content small-12 large-9 cell">

		    	<?php if (have_posts()) : while (have_posts()) : the_post();?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

                    </div>
                    <div class="small-12 large-3 cell">
                        <div class="default-page-sidebar">
                            <?php dynamic_sidebar( 'news' ); ?>
                        </div>
                    </div>

	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
