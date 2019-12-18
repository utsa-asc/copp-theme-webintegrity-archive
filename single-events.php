<?php
/**
 * The template for displaying all single events
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner hero colored single-events" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x">
                            <div class="cell text-center">
                                <div class='h1'><?php the_title(); ?></div>
                                <?php if(get_field('page_description')) : ?>
                                  <p><?php the_field('page_description'); ?></p>
                                <?php endif; ?>
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
                      <div class='h2 fancy-header'><?php the_title(); ?></div>
                  </div>
              </div>
            </section>
            <div class="grid-container">
                <div class='grid-x grid-margin-x grid-padding-x'>
                    <div class="inner-content event-single small-12 large-9 cell">
                       <?php $date = get_field('event_date', false, false);
                          // make date object
                          $date = new DateTime($date);?>

                      <div class='h5'>
                        Date: <?php echo $date->format('F j, Y'); ?></div>

                      <div class='h5'>
                        Time: <?php echo $date->format('g:i A'); ?>
                      </div>

                      <div class='event-image background' style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);"></div>

                      <p>
                        <?php the_content(); ?>
                      </p>
                    </div> <!-- end #inner-content -->
                    <div class="small-12 large-3 cell">
                        <div class="default-page-sidebar">

                            <?php

                            $category = get_the_category();
                            $category_parent_id = $category[0]->category_parent;
                            if ( $category_parent_id == 35 ) :?>
                                     <?php wp_nav_menu(array('menu' => __( 'Research Subjects', 'jointswp' ),   	// Nav name
                                        'menu_class' => 'menu',      					// Adding custom nav class
                                        )); ?>
                                <?php endif;?>
                            <?php get_sidebar('page'); ?>
                        </div>
                    </div>
                </div>
            </div>
 <?php endwhile; endif; ?>
<?php get_footer(); ?>
