<?php
/*
Template Name: About - Child Page
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

            <div class="inner hero dept-hero colored template-child-about" style="background-image: url(<?php echo $image; ?>);">
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
            <!--
            <section class="grid-container ">
              <div class="grid-x grid-margin-x grid-padding-x">
                  <div class="small-12 cell">
                      <div class='h2 fancy-header'><?php the_title(); ?></div>
                  </div>
              </div>
            </section>
          -->
            <section class='welcome grid-container '>

              <div class="grid-x grid-margin-x grid-padding-x">
                <div class="small-12 large-7 cell">
                  <?php the_field('about_child_text'); ?>
                </div>

                <div class='small-12 large-5 cell'>
                  <?php $image = get_field('about_child_image');

                    if( !empty($image) ): ?>

                    	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                    <?php endif; ?>
                    <div class='image-caption'>
                      <?php the_field('about_child_image_caption'); ?>
                    </div>
                </div>
              </div>
            </section>

            <?php $post_object = get_field('about_featured_alumni');
                  if( $post_object ):?>
                    <section class='notable-alumni'>
                      <div class="grid-container">
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        $img_id = get_post_thumbnail_id(get_the_ID()); ?>
                        <?php $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>

                        <div class="grid-x grid-padding-x">
                          <div class="small-12 large-5 cell">
                            <a href='<?php the_permalink(); ?>' aria-label="<?php echo $alt_text; ?>">
                              <div class='alumn-image background' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
                            </a>
                          </div>
                          <div class="small-12 large-7 cell">
                            <a href='<?php the_permalink(); ?>'>
                                <div class='h3'>Notable Alumni</div>
                                <div class='date-container align-middle'>
                                  <span class='divider'></span><span class='alumni-date'><?php the_field('alumni_date') ?></span>
                                </div>
                                <div class='h4'><?php the_field('alumni_name'); ?></div>
                                <div class='h5'><?php the_field('alumni_title'); ?></div>
                                <div class='h5 degree'><?php the_field('alumni_degree'); ?></div>

                                <p><?php the_field('alumni_short_bio'); ?></p>
                            </a>
                            <a href='<?php the_permalink(); ?>' class='button transparent'>Read Story &#8250;</a>
                          </div>
                        </div>
                     </div>
                   </section>
                   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
              <?php endif; ?>
              <?php $post_objects = get_field('about_child_alumni');
                  if( $post_objects ): ?>
                    <section class='past-notable-alumni'>
                      <div class="grid-container">

                          <div class="grid-x grid-padding-x">
                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>


                                <div class="small-12 large-4 cell">
                                  <div class='date-container align-middle'>
                                    <span class='divider'></span><span class='alumni-date'><?php the_field('alumni_date') ?></span>
                                  </div>
                                  <a href='<?php the_permalink(); ?>'>
                                    <div class='alumn-image background' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
                                  </a>
                                  <a href='<?php the_permalink(); ?>'>
                                    <div class='h5'><?php the_field('alumni_name'); ?></div>
                                    <div class='h6'><?php the_field('alumni_title'); ?></div>
                                    <div class='h6 degree'><?php the_field('alumni_degree'); ?></div>
                                  </a>
                                </div>

                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        </div>
                      </div>
                    </section>
                 <?php endif; ?>

    <?php endwhile; endif; ?>
 <?php get_footer(); ?>
