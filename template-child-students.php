<?php
/*
Template Name: Current Students - Child Page
*/
get_header();

global $post;
$parents = get_post_ancestors( $post->ID );
/* Get the ID of the 'top most' Page if not return current page ID */
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;

if(get_field('header_image', $id)) {
    $image = get_field('header_image', $id);
} else {
     $image =  get_field('banner_image', 'option');
}

$add_menu = get_field('department_menu', $id);
$dept_title = get_the_title($id);
$desc = get_field('page_description', $id);
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="inner hero dept-hero colored template-child-students" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x text-center">
                            <div class="cell">
                                <div class='h1'><?php echo $dept_title; ?></div>
                                <?php if ($desc) :?>
                                  <p><?php echo $desc; ?></p>
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
                    if($add_menu) :?>
                      <?php wp_nav_menu( array( 'menu' => $add_menu, 'items_wrap' => "<ul id='parent-" . $id . "' class='parent-page dropdown menu' data-responsive-menu='accordion large-dropdown'>%3\$s</ul>" ) ); ?>
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

          <div class="grid-container ">
            <div class="grid-x grid-margin-x grid-padding-x">
                <div class="small-12 cell">
                    <div class='h2 fancy-header'><?php the_field('students_header'); ?></div>
                </div>
            </div>
            <section class='current-student-container'>
              <div class="grid-x grid-margin-x">
                <?php if(have_rows('students_repeater')) :
                  while(have_rows('students_repeater')) : the_row();?>

                      <div class="small-12 large-6 cell">
                        <a href='<?php the_sub_field('link_url'); ?>'>
                          <div class="repeater-block background colored" style='background-image: url(<?php the_sub_field('background_image') ?>);'>
                            <div class='gradient-transparent'>
                              <div class='h3'><?php the_sub_field('name'); ?></div>
                            </div>
                          </div>
                        </a>
                      </div>

                    <?php endwhile;
                  endif; ?>
              </div>
            </section>

            <section class='info-pages'>
              <div class='h4 text-center'><?php the_field('info_pages_header'); ?></div>
              <div class="grid-x grid-padding-x grid-margin-x grid-padding-y grid-margin-y">
                <?php if(have_rows('info_pages_repeater')) :
                  while(have_rows('info_pages_repeater')) : the_row();?>
                      <div class="small-12 large-4 cell">
                        <a href='<?php the_sub_field('url'); ?>'>
                          <div class="repeater-block background colored" style='background-image: url(<?php the_sub_field('image') ?>);'></div>
                          <div class='h5'><?php the_sub_field('title'); ?></div>
                          <p><?php the_sub_field('description'); ?></p>
                        </a>
                        <a href='<?php the_sub_field('url'); ?>' class='text-link'>More Details &#8250;</a>
                      </div>
                <?php endwhile; endif; ?>
              </div>
            </section>
          </div>


    <?php endwhile; endif;
 get_footer(); ?>
