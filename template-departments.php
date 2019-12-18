<?php

/*
 * Template Name: Departments
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner hero colored template-departments" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x text-center">
                            <div class="cell">
                                <div class='h1'><?php the_title(); ?></div>
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

            <section class="grid-container">
              <div class="grid-x grid-margin-x grid-padding-x">
                  <div class="small-12 cell">
                      <div class='h2 fancy-header'><?php the_title(); ?></div>
                  </div>
              </div>
            </section>

            <div class="inner-content">
                <div class="grid-container">

                  <?php if(get_the_content()) :?>
                    <section class='content'>
                        <div class="grid-x grid-margin-x grid-padding-x grid-padding-y">
                          <div class="small-12 cell text-center">
                              <?php the_content();?>
                          </div>
                        </div>
                    </section>
                  <?php endif; ?>

                  <section class='departments grid-container'>

                    <div class="grid-x grid-padding-x grid-margin-x grid-margin-y">
                      <?php if(have_rows('home_departments_repeater', 'option')) :
													while(have_rows('home_departments_repeater', 'option')) : the_row();?>
														<div class="small-12 large-4 cell colored">
															<a href='<?php the_sub_field('url'); ?>'>
																<div class="department-block background" style='background-image: url(<?php the_sub_field('background_image') ?>);'>
																	<div class='gradient-transparent'>
																		<div class='h3'><?php the_sub_field('title'); ?></div>

																		</div>
																	</div>
                                  <div class='programs-box colored'>
                                    <div class='gradient-orange'>
                                    <?php if(have_rows('program_list_repeater')) :
                                      while(have_rows('program_list_repeater')) : the_row(); ?>
                                        <?php if(get_sub_field('url')) : ?>
                                            <div class='program-title'><a href='<?php the_sub_field('url'); ?>'><?php the_sub_field('program');?></a></div>
                                        <?php else : ?>
                                            <div class='program-title'><?php the_sub_field('program');?></div>
                                        <?php endif; ?>
                                    <?php endwhile; endif;  ?>
                                  </div>
																</div>
															</a>
														</div>
												<?php endwhile; endif;?>
                    </div>
                  </section>


                </div>

            </div> <!-- end #inner-content -->

            </div> <!-- end #content -->
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
