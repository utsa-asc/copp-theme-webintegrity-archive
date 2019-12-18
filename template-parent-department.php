<?php

/*
 * Template Name: Parent Department
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner hero dept-hero colored template-parent-department" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x text-center">
                            <div class="cell">
                                <div class='h1'><?php the_title(); ?></div>
                                <?php if (get_field('page_description')) :?>
                                  <p><?php the_field('page_description'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


              <div class="title-bar" data-responsive-toggle="child-menu" data-hide-for="large">
                <button class="menu-icon" type="button" data-toggle="child-menu"></button>
                <div class="title-bar-title">Menu</div>
              </div>
              <div id='child-menu'>
                <div class="top-bar-left">
                  <?php
                    $add_menu = get_field('department_menu');
                    if($add_menu) :?>
                      <?php wp_nav_menu( array( 'menu' => $add_menu, 'items_wrap' => "<ul id='parent-" . get_the_ID() . "' class='parent-page dropdown menu' data-dropdown-menu data-responsive-menu='drilldown large-dropdown'>%3\$s</ul>" ) ); ?>
                   <?php endif;?>
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
                        <div class='h2 fancy-header'><?php the_field('research_header'); ?></div>
                    </div>
                </div>
              </section>
            <div class="inner-content ">
              <div class='grid-container'>
                <div class='grid-x'>
                  <div class='small-12 cell'>
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>


            </div> <!-- end #inner-content -->

        </div> <!-- end #content -->
    <?php endwhile; endif; ?>

<?php get_footer(); ?>
