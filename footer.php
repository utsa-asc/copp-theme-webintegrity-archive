<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>


				<footer class="footer colored" role="contentinfo">
          <div class='footer-cta background' style='background-image:url(<?php the_field('footer_cta_background_image', 'option'); ?>);'>
              <div class='gradient'>
                  <div class="grid-container text-center">
                        <div class='h2'><?php the_field('footer_cta_title', 'option'); ?></div>
                        <p><?php the_field('footer_cta_text', 'option'); ?></p>
                        <a href='<?php the_field('footer_cta_button_url', 'option'); ?>' class='button'><?php the_field('footer_cta_button_text', 'option'); ?></a>
                  </div>
              </div>
          </div>
					<div class="inner-footer">
              <div class="grid-container">
                   <div class="grid-x grid-margin-x">
                      <div class="small-12 medium-3 cell">
                          <?php $image = get_field('header_logo', 'option');

                          if( !empty($image) ): ?>

                                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="footer-logo" />

                          <?php endif; ?>
                          <a href='<?php the_field('address_link', 'option'); ?>' class='address'><?php the_field('address', 'option'); ?></a>
                          <a href='tel:<?php the_field('phone', 'option'); ?>' class='phone'><span>Phone:</span><?php the_field('phone', 'option'); ?></a>
                          <a href='tel:<?php the_field('fax', 'option'); ?>' class='fax'><span>Fax:</span><?php the_field('fax', 'option'); ?></a>
                      </div>

                      <div class="small-9 medium-9 cell">
                          <span><strong>Mission</strong></span>
                          <p><?php the_field('mission_statement', 'option'); ?></p>
                          <hr>
                          <div class='grid-x align-middle'>
                            <div class='small-12 large-7 cell'>
                              <?php
                                  $form_object = get_field('footer_email_form', 'option');
                                  gravity_form_enqueue_scripts($form_object['id'], true);
                                  gravity_form($form_object['id'], true, true, false, '', true, 1);
                              ?>
                            </div>
                            <div class="small-12 large-5 cell text-center social-icons">
                              <?php if(have_rows('social_icons', 'option')) :
                                while(have_rows('social_icons', 'option')) : the_row(); ?>
                                <a href='<?php the_sub_field('social_icon_url'); ?>' aria-label="<?php the_sub_field('alt_text'); ?>" target='_blank'><i class="<?php the_sub_field('social_icon'); ?>"></i></a>
                              <?php endwhile; endif; ?>
                            </div>
                          </div>
                      </div>
                  </div>
		         </div>

				</footer> <!-- end .footer -->

			</div>  <!-- end .off-canvas-content -->

		</div> <!-- end .off-canvas-wrapper -->

		<?php wp_footer(); ?>

                <script>

                    (function($){
                      $(document).ready(function(){
                          $('.default-page-sidebar ul.menu li.menu-item-has-children li').click(function(e){
                              e.stopPropagation();

                            });

                          $('.default-page-sidebar ul.menu li.menu-item-has-children').on('click', function(e){
                              e.preventDefault();
                              $(this).toggleClass('expanded');
                          });



                          $('a.button.transparent').append('  &#8250;');
                      });
                    })(jQuery);

                </script>

                <script>

                    (function($){

                      $('#filter-button').on('click', function(){
                        $('ul#example-tabs').removeClass('hidden');
                        $('ul#example-tabs').on('mouseleave', function(){
                          $(this).addClass('hidden');
                        });

                      });

                    })(jQuery);

                </script>

                <script>
                    (function($){
                        $('.event-slider').slick({
                          infinite: true,
                          slidesToShow: 3,
                          slidesToScroll: 3,
                          dots: true,
                          adaptiveHeight: true,
                          responsive: [
                              {
                                breakpoint: 760,
                                settings: {
                                  slidesToShow: 1,
                                  slidesToScroll: 1,
                                  infinite: true,
                                  dots: true,
                                }
                              }
                          ]
                        });

                        $('.spotlight-slider').slick({
                          infinite: true,
                          slidesToShow: 1,
                          slidesToScroll: 1,

                        });

                    })(jQuery);
                </script>


	</body>

</html> <!-- end page -->
