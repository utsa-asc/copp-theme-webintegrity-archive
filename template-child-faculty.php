<?php
/*
Template Name: Faculty - Child Page
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

            <div class="inner hero dept-hero colored template-child-faculty" style="background-image: url(<?php echo $image; ?>);">
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
                    <div class='h2 fancy-header'><?php the_title(); ?> - <?php echo $dept_title; ?></div>
                </div>
            </div>
            <div class="grid-x grid-margin-x program-container">
              <?php $dept = get_field('faculty_department'); ?>
              <?php $entries = get_posts(
                      array(
                          'post_type' => 'directory',
                          'posts_per_page' => -1,
                          'meta_key' => 'directory_last_name',
                          'orderby' => 'meta_value',
                          'order' => 'ASC',
                          'tax_query' => array(
                              array(
                                'taxonomy' => 'entry_dept',
                                'field' => 'id',
                                'terms' => $dept,
                              )
                            )
                          )
                      );
              if ($entries) : ?><!-- open if entries -->

                           <?php $types = get_field('directory_classification', 'option');?>
                           <?php foreach($types as $type) : ?><!-- open foreach type -->
                                 <?php $the_type = $type->name;
                                  $term_true = ''; ?>
                                  <!-- Add classification header if has posts -->
                                  <?php foreach($entries as $post) :
                                        setup_postdata($post);
                                        if(has_term( $the_type, 'entry_type' )) :
                                          $term_true = 'true';
                                        endif; wp_reset_postdata(); endforeach;?>
                                        <?php if($term_true == 'true') :?>


                                          <div class="small-12 cell">
                                            <div class='classification-title align-middle'>
                                              <span class='h4 classification'><?php echo $the_type; ?></span><span class='divider'></span>
                                            </div>
                                          </div>


                                        <?php endif; ?>
                                  <!-- Get all posts
                      <?php foreach($entries as $post) : ?><!-- open foreach posts -->
                            <?php setup_postdata($post);?>
                              <?php if(has_term( $the_type, 'entry_type' )) :?><!-- open if has term -->
                                <div class="small-12 large-4 cell">

                                    <div class="directory-block" data-open="1post-<?php echo get_the_ID(); ?>">
                                        <?php if(has_post_thumbnail()): ?>
                                          <div class="dir-image" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);"  data-open="1post-<?php echo get_the_ID(); ?>"></div>
                                        <?php endif; ?>
                                        <div class="dir-info">
                                            <div class='date-container align-middle'>
                                              <span class='divider'></span>
                                            </div>
                                            <div class='h4'><?php the_title(); ?></div>
                                            <?php if(get_field('directory_title')): ?>
                                                <p class='title'><?php the_field('directory_title'); ?></p>
                                            <?php endif; ?>
                                            <?php if(get_field('directory_email_address')) : ?>
                                                <a href="mailto:<?php the_field('directory_email_address'); ?>" class='email' title="Email <?php the_title(); ?>"><?php the_field('directory_email_address'); ?></a><br>
                                            <?php endif; ?>
                                            <?php if(get_field('directory_phone_number')) : ?>
                                                <a href="tel:<?php the_field('directory_phone_number'); ?>" class='phone' title="Call <?php the_title(); ?>"><?php the_field('directory_phone_number'); ?></a><br>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <div class='reveal' id="1post-<?php echo get_the_ID(); ?>" data-reveal>
                                      <div class='directory-card'>
                                        <div class="grid-x grid-margin-x">
                                            <div class='small-12 large-5 cell'>
                                              <div class="dir-image" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);"  data-open="post-<?php echo get_the_ID(); ?>"></div>
                                            </div>
                                            <div class="small-12 large-7">
                                              <span class='divider'></span>
                                              <div class='h5'><?php the_title(); ?></div>
                                              <div class='grid-x'>
                                                <div class='small-12 large-8 cell'>

                                                    <?php if(get_field('directory_title')): ?>
                                                        <div class='title-text'>Title</div>
                                                        <p class='title'><?php the_field('directory_title'); ?></p>
                                                    <?php endif; ?>

                                                    <?php if(get_field('directory_phone_number')) : ?>
                                                        <div class='title-text'>Phone Number</div>
                                                        <a href="tel:<?php the_field('directory_phone_number'); ?>" class='phone' title="Call <?php the_title(); ?>"><?php the_field('directory_phone_number'); ?></a><br>
                                                    <?php endif; ?>

                                                    <?php if(get_field('directory_email_address')) : ?>
                                                        <div class='title-text'>Email</div>
                                                        <a href="mailto:<?php the_field('directory_email_address'); ?>" class='email' title="Email <?php the_title(); ?>"><?php the_field('directory_email_address'); ?></a><br>
                                                    <?php endif; ?>

                                                    <?php if(get_field('directory_title')): ?>
                                                        <div class='title-text'>Room</div>
                                                        <p class='room'><?php the_field('directory_building'); ?></p>
                                                    <?php endif; ?>

                                                    <?php if(get_field('directory_title')): ?>
                                                        <div class='title-text'>Department</div>
                                                        <p class='dept'><?php the_field('directory_department'); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="small-12 large-4 cell">

                                                  <?php if(have_rows('directory_downloads_repeater')) :?>
                                                    <div class='title-text'>Downloads</div>
                                                    <?php while(have_rows('directory_downloads_repeater')) : the_row(); ?>

                                                      <<?php $file = get_sub_field('file');

                                                      if( $file ): ?>

                                                        <a href="<?php echo $file['url']; ?>"><?php the_sub_field('file_name'); ?></a>

                                                      <?php endif; ?>

                                                  <?php endwhile; endif; ?>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class='grid-x grid-margin-x'>
                                          <?php if(get_field('directory_research_interests')) : ?>
                                            <div class="small-12 large-6 cell">
                                                <div class='title-text'>Research Interests</div>
                                                <?php the_field('directory_research_interests'); ?>
                                            </div>
                                          <?php endif; ?>
                                          <?php if(get_field('directory_education')) : ?>
                                            <div class="small-12 large-6 cell">
                                                <div class='title-text'>Education</div>
                                                <?php the_field('directory_education'); ?>
                                            </div>
                                          <?php endif; ?>
                                        </div>
                                      </div>

                                      <button class='close-button' data-close aria-label='Close Modal' type='button'>
                                          <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>
                                </div>
                          <?php endif; ?><!-- open if has term -->
                    <?php endforeach; wp_reset_postdata(); ?><!-- close foreach posts -->
              <?php endforeach; ?> <!--close foreach type -->
          <?php endif;  ?><!-- close if entries -->
         </section>
            <section class='openings-container'>
              <div class='h4 text-center'><?php the_field('faculty_openings_header'); ?></div>
              <?php if(have_rows('faculty_openings_repeater')) :
                while(have_rows('faculty_openings_repeater')) : the_row(); ?>

                <div class="grid-x align-middle single-opening">
                  <div class="small-12 large-3 cell text-center">
                    <div class='h5'><?php the_sub_field('title'); ?></div>
                  </div>
                  <div class="small-12 large-6 cell">
                    <p><?php the_sub_field('description'); ?></p>
                  </div>
                  <div class="small-12 large-3 cell text-center">
                    <a href='<?php the_sub_field('url'); ?>' class='button transparent'>Apply  &#8250;</a>
                  </div>
                </div>
                <hr>

              <?php endwhile; endif; ?>

            </section>
          </div>


    <?php endwhile; endif;
 get_footer(); ?>
