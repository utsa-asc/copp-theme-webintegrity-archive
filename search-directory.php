<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

    <div class="inner hero colored search-directory" style="background-image: url(<?php the_field('directory_background_image', 'option');?>);">
        <div class="gradient">
            <div class="grid-container">
                <div class="grid-x grid-margin-x text-center">
                    <div class="cell">
                        <div class='h1'>Faculty & Staff</div>
                        <p><?php the_field('directory_intro', 'option'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class='directory-nav'>
      <div class="grid-container">
        <div class="grid-x">
          <div class="small-12 cell">
            <div class="directory-menu text-center">
                <?php $terms = get_field('directory_navigation', 'option');

                    if( $terms ): $i = 1; ?>
                        <ul class="directory tabs text-center" data-deep-link="true" data-responsive-accordion-tabs="accordion large-tabs" data-allow-all-closed="true" id="example-tabs">
                            <li class="is-active"><a href="#panel0" aria-selected="true">ALL</a></li>
                            <?php foreach( $terms as $term ): ?>
                                <li><a href="/directory/#panel<?php echo $i; ?>" aria-selected="true"><?php echo $term->name; ?></a></li>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </ul>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class='directory-search grid-container grid-x show-for-large'>
      <div class="small-12 cell text-right">
          <?php get_search_form( ); ?>
      </div>
    </section>


    <div class="directory-main directory-content content grid-container">

            <div class="inner-content">
              <div class="grid-x grid-margin-x grid-padding-x">
                <div class="small-12 cell">
                  <div class='h3 fancy-header'><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></div>
                </div>
              </div>
              <div class="grid-x grid-margin-x grid-padding-x">

			              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="small-12 large-4 cell">
                            <div class="directory-block">
                                <?php if(has_post_thumbnail()): ?>
                                  <div class="dir-image show-for-large" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);"  data-open="post-<?php echo get_the_ID(); ?>"></div>
                                <?php endif; ?>
                                <div class="dir-info">
                                    <div class='date-container align-middle show-for-large'>
                                      <span class='divider'></span>
                                    </div>
                                    <div class='h4'  data-open="post-<?php echo get_the_ID(); ?>"><?php the_title(); ?></div>
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
                            <div class='reveal' id="post-<?php echo get_the_ID(); ?>" data-reveal>
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

                                              <?php $file = get_sub_field('file');

                                              if( $file ): ?>

                                                <a href="<?php echo $file['url']; ?>" target='_blank'> <?php the_sub_field('file_name'); ?> </a>

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

                      <?php endwhile; ?>

                    <?php else: ?>
                        <p><?php _e('Sorry, there are no directory entries that match your search. Please try another name.'); ?></p>
	                  <?php endif; ?>

              </div>
           </div> <!-- end #inner-content -->

	 </div> <!-- end #content -->

<?php get_footer(); ?>
