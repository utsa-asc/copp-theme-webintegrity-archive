<?php
/*
Template Name: Events - Child Page
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

            <div class="inner hero dept-hero colored template-child-events" style="background-image: url(<?php echo $image; ?>);">
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
              <section class="grid-container ">
                <div class="grid-x grid-margin-x grid-padding-x">
                  <div class="small-12 cell">
                    <?php utsa_breadcrumb(); ?>
                  </div>
                </div>
              </section>
          <section class="grid-container ">
            <div class="grid-x grid-margin-x grid-padding-x">
                <div class="small-12 cell">
                    <div class='h2 fancy-header'><?php the_field('events_header'); ?> - <?php echo $dept_title; ?></div>
                </div>
            </div>
            <div class="grid-x grid-margin-x research-container">
              <?php
                $dept = get_field('event_department');
                $args = array(
                    'posts_per_page' => 25,
                    'post_type' => 'events',
                    'tax_query' => array(
                          array(
                              'taxonomy' => 'entry_dept',
                              'field' => 'term_id',
                              'terms' => $dept,
                          )
                      )
                  );
                  $loop = new WP_Query( $args );

                  if($loop->have_posts()) :
                    while( $loop->have_posts() ): $loop->the_post();
                      // get raw date
                      $date = get_field('event_date', false, false);
                      // make date object
                      $date = new DateTime($date);
                       ?>
                      <div class='small-12 medium-4 cell post-box'>
                        <div class='post-date'><span><?php echo $date->format('d'); ?></span><?php echo $date->format('M'); ?></div>
                        <a href='<?php the_permalink(); ?>'>
                          <div class='post-image' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
                        </a>
                        <div class='post-info'>
                          <a href='<?php the_permalink(); ?>'>
                            <span class='h5'><?php the_title(); ?></span>
                            <p><?php the_field('event_description'); ?></p>
                            <p class='post-time'><?php echo $date->format('g:i A'); ?></p>
                          </a>
                          <a href='<?php the_permalink(); ?>' class='text-link'>More Details &#8250;</a>
                        </div>
                      </div>

                    <?php endwhile; ?>
                  <?php else: ?>
                    <div class='small-12 medium-4 cell post-box'>
                      <div class='post-date'></div>

                      <div class='post-info'>
                          <span class='h5'>No Upcoming Events</span>
                      </div>
                    </div>
                  <?php endif;?>
              </div>
          </section>


    <?php endwhile; endif;
 get_footer(); ?>
