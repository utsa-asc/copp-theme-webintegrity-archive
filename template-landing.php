<?php

/*
 * Template Name: Landing
 */

get_header();

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php $hero_type = get_field('home_hero_style');
        if($hero_type == 'image') :?>
            <section class="home hero colored background background-image template-landing" style="background-image: url(<?php the_field('home_hero_background_image'); ?>);">
							<div class='gradient'>
                    <div class='grid-container'>
                        <div class='grid-x grid-margin-x'>
                            <div class='small-12 cell text-center'>
																<div class='h1'><?php the_field('home_hero_static_header'); ?></div>
																<p><?php the_field('home_hero_static_text'); ?></p>
                                <?php if(get_field('home_hero_static_button_text')) :?>
                                    <a href="<?php the_field('home_hero_static_button_url'); ?>" class="button" target='_blank'><?php the_field('home_hero_static_button_text'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif($hero_type == 'video') : ?>
            <section class="home hero colored background background-image" style="background-image: url(<?php the_field('home_hero_background_image'); ?>);">
							<div class='gradient'>
                    <div class='grid-container'>
                        <div class='grid-x grid-margin-x'>
                            <div class='small-12 cell text-center'>
                              <div class='h1'><?php the_field('home_hero_static_header'); ?></div>
                              <p><?php the_field('home_hero_static_text'); ?></p>
                              <?php if(get_field('home_hero_static_button_text')) :?>
                                  <a href="<?php the_field('home_hero_static_button_url'); ?>" class="button" target='_blank'><?php the_field('home_hero_static_button_text'); ?></a>
                              <?php endif; ?>
                          </div>
                        </div>
                    </div>



              </div>
               <div class="bg-video">
                    <video autoplay loop muted>
                        <source src="<?php the_field('home_hero_background_video'); ?>" type="video/mp4">
                    </video>
                </div>
            </section>

        <?php elseif($hero_type == 'slider') :?>

            <section class="home hero colored hero-slider">
                <?php $i = 0; if(have_rows('home_hero_background_slider')) :
                    while(have_rows('home_hero_background_slider')) : the_row();?>
                        <div class="slide background" style="background-image: url(<?php the_sub_field('home_hero_slider_image'); ?>);">
                            <div class='gradient'>
                                <div class='grid-container'>
                                    <div class='grid-x grid-margin-x'>
                                        <div class='small-12 cell text-center'>
                                            <div class='h1'><?php the_sub_field('home_hero_slider_header'); ?></div>
                                            <p><?php the_sub_field('home_hero_slider_text'); ?></p>
                                            <?php if(get_sub_field('home_hero_slider_button_url')) :?>
                                                <a href="<?php the_sub_field('home_hero_slider_button_url'); ?>" class="button" target='_blank'><?php the_sub_field('home_hero_slider_button_text'); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php $i++; endwhile;endif;?>

            </section>
        <?php endif; ?>
				<section class='grad-buttons grid-container full'>
					<div class='grid-x'>
						<a href='<?php the_field('home_grad_buttons_undergrad_url'); ?>' class='small-12 medium-6 cell'>
							<div class='undergrad-button background luminosity colored text-center large-text-right' style="background-image: url(<?php the_field('home_grad_buttons_undergrad_background'); ?>);">
								<div class='gradient-blue'>
									<div class='h2'><?php the_field('home_grad_buttons_undergrad_text'); ?></div>
								</div>
							</div>
						</a>

						<a href='<?php the_field('home_grad_buttons_grad_url'); ?>' class='small-12 medium-6 cell'>
							<div class='grad-button background luminosity colored text-center large-text-left' style="background-image: url(<?php the_field('home_grad_buttons_grad_background'); ?>);">
								<div class='gradient-orange'>
									<div class='h2'><?php the_field('home_grad_buttons_grad_text'); ?></div>
								</div>
							</div>
						</a>
					</div>
				</section>
        <div class="home content">

            <div class="inner-content">
                <main role="main">
                        <?php if(get_field('home_featured_event_date')) :
                            $date = get_field('home_featured_event_date');

                            if ( $date < date('Y/m/d H:i:s') ) :
                            else:?>

                    <div class="grid-container">
                            <section class='featured-event'>
                                <div class='grid-x grid-margin-x'>
                                    <div class='small-12 large-7 cell'>
																			<a href='<?php the_field('home_featured_event_button_url'); ?>'>
																				<div class='h3'><?php the_field('home_featured_event_name'); ?></div>
																				<p><?php the_field('home_featured_event_location'); ?><br><?php the_field('home_featured_event_time'); ?></p>
																			</a>
																			<a href='<?php the_field('home_featured_event_button_url'); ?>' class='text-link'><?php the_field('home_featured_event_button_text'); ?> &#8250;</a>

																		</div>
                                    <div class='small-12 large-5 cell text-center large-text-right'>
                                        <div id="getting-started" class='grid-x grid-margin-x' data-time='<?php the_field('home_featured_event_date'); ?>'></div>
                                    </div>
                                </div>
																<hr>
                            </section>
                      </div>
                            <?php endif; endif;?>


										<section class='upcoming-events grid-container'>
												<div class="grid-x">
													<div class='auto cell'>
														<div class='h2 fancy-header'><?php the_field('home_events_header_text'); ?></div>
													</div>
												</div>
												<div class='responsive event-slider'>
													<?php $posts = eventPost();
														if($posts) :
															foreach ($posts as $post) :
																setup_postdata($post);
                                // get raw date
                                $date = get_field('event_date', false, false);


                                // make date object
                                $date = new DateTime($date);
                                 ?>
																<div class='s'>
                                   <div class='post-box'>
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
																</div>

															<?php endforeach; wp_reset_postdata();
														endif;
													 ?>
												</div>
										</section>

										<section class='faculty-spotlight spotlight-slider'>
                      <?php $spotlights = get_field('faculty_spotlights_repeater');
                      if($spotlights) :
												  shuffle( $spotlights );
                          foreach($spotlights as $spotlight) :?>
                              <div class='grid-container full background colored'>
                                <div class="grid-x">
                                   <div class='small-12 large-6 cell text-center large-text-right'>
                                     <?php

                                    $image = $spotlight['home_spotlight_background_image'];

                                    if( !empty($image) ): ?>

                                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                                    <?php endif; ?>
                                  </div>
                                   <div class="small-12 large-6 cell">
                                      <div class="text-center large-text-left">
                                        <div class='faculty-spotlight-content text-left'>
                                          <div class='h2 fancy-header'><?php echo $spotlight['home_spotlight_header_text']; ?></div>
                                          <div class='h4'><?php echo $spotlight['home_spotlight_name']; ?></div>
                                          <div class='subtext'><?php echo $spotlight['home_spotlight_subtext']; ?></div>
                                          <p><?php echo $spotlight['home_spotlight_text']; ?></p>
                                          <?php if($spotlight['home_spotlight_button_url']) : ?>
                                            <a href="<?php echo $spotlight['home_spotlight_button_url']; ?>" class='button transparent'><?php echo $spotlight['home_spotlight_button_text']; ?></a>
                                          <?php endif;?>
                                        </div>
                                      </div>
                                   </div>
                                </div>
                              </div>
                      <?php endforeach; endif;?>
										</section>

										<section class='departments grid-container'>

											<div class="grid-x grid-padding-x grid-margin-x grid-margin-y">
												<div class='small-12 cell'>
													<div class='h2 fancy-header'><?php the_field('home_departments_header', 'option'); ?></div>
												</div>
												<?php if(have_rows('home_departments_repeater', 'option')) :
													while(have_rows('home_departments_repeater', 'option')) : the_row();?>
														<div class="small-12 large-4 cell colored">
															<a href='<?php the_sub_field('url'); ?>'>
																<div class="department-block background" style='background-image: url(<?php the_sub_field('background_image') ?>);'>
																	<div class='gradient-transparent'>

                                    <div class='h3'><?php the_sub_field('title'); ?></div>
																		</div>
																	</div>
                                  <!--
                                  <div class='programs-box colored'>
                                    <div class='gradient-orange'>
                                        <div class='program-title h4'><?php the_sub_field('title'); ?></div>
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
                              -->
															</a>
														</div>
												<?php endwhile; endif;?>
											</div>
										</section>

										<section class='news grid-container'>
											<div class="grid-x">
												<div class="small-12 cell">
													<div class='h2 text-center'><?php the_field('home_news_header') ?></div>

												<div class='grid-x grid-padding-x'>
													<?php $posts = newsPosts();
														if($posts) :
															foreach ($posts as $post) :
																setup_postdata($post); ?>
																<div class='small-12 cell news-box'>
																	<div class='grid-x align-middle'>
																		<div class='small-2 large-1 cell'>
																				<div class='news-date'><?php the_time('M'); ?><br><span><?php the_time('d'); ?></span></div>
																		</div>
																		<div class='small-10 large-3 cell'>
                                      <a href='<?php the_permalink(); ?>'>
																				<div class='news-image background' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
                                      </a>
                                    </div>
																		<div class='small-12 large-5 cell text-center large-text-left'>
                                      <a href='<?php the_permalink(); ?>'>
																				<div class='news-info'>
																					<div class='h5'><?php the_title(); ?></div>
																				</div>
                                      </a>
																		</div>
																		<div class='small-12 large-3 cell text-center'>
																			<a href='<?php the_permalink(); ?>' class='button transparent'>Read More</a>
																		</div>
																	</div>
																</div>

															<?php endforeach; wp_reset_postdata();
														endif;
													 ?>
												</div>
												</div>
											</div>
                       <div class="grid-x grid-margin-y grid-padding-y">
													<div class='auto cell text-center'>
														<a href='/category/news/' class='button'>View All News</a>
													</div>
												</div>
										</section

                </main> <!-- end #main -->

							</div> <!-- end #inner-content -->

					</div> <!-- end #content -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>

<script>
(function($){

    $('.hero-slider').slick({
      speed: 1200,
      cssEase: 'ease',
      autoplay: true,
      arrows: false,
      dots: true,
      autoplaySpeed: 6000,
      adaptiveHeight: true,
    });

})(jQuery);

</script>
