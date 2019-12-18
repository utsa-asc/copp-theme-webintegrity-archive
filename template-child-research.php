<?php
/*
Template Name: Research - Child Page
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

            <div class="inner hero dept-hero colored template-child-research" style="background-image: url(<?php echo $image; ?>);">
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
          <section class="grid-container ">
            <div class="grid-x grid-margin-x grid-padding-x">
                <div class="small-12 cell">
                    <div class='h2 fancy-header'><?php the_field('research_header'); ?></div>
                </div>
            </div>
            <div class="grid-x grid-margin-x research-container">
              <?php if(have_rows('research_repeater')) : ?>
                <?php while(have_rows('research_repeater')) : the_row(); ?>
                  <div class='small-12 cell'>
                    <div class='research-year-group'>
                        <div class="h5">
                          <?php the_sub_field('research_year'); ?>
                        </div>

                        <?php if(have_rows('publications_repeater')) : ?>
                          <?php while(have_rows('publications_repeater')) : the_row(); ?>

                          <?php if(get_sub_field('url')) :?>
                            <a href='<?php the_sub_field('url'); ?>'>
                              <?php the_sub_field('title'); ?>
                            </a>
                          <?php else: ?>
                            <p>
                              <?php the_sub_field('title'); ?>
                            </p>

                          <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </div>
                  </div>

                <?php endwhile; endif; ?>
            </div>
          </section>


    <?php endwhile; endif;
 get_footer(); ?>
