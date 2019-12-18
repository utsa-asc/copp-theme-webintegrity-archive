<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

    <div class="inner hero colored archive-directory" style="background-image: url(<?php the_field('directory_background_image', 'option');?>);">
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
                            <li class="tabs-title is-active"><a data-tabs-target="panel0" href="#panel0" aria-selected="true">ALL</a></li>
                            <?php foreach( $terms as $term ): ?>
                                <li class="tabs-title"><a data-tabs-target="panel<?php echo $i; ?>" href="#panel<?php echo $i; ?>" aria-selected="true"><?php echo $term->name; ?></a></li>
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

    <div class="directory-main directory-content">

            <div class="inner-content grid-x grid-margin-x grid-padding-x">

                <main class="main small-12 cell" role="main">
                    <div class="tabs-content" data-tabs-content="example-tabs">


                                <div class="tabs-panel is-active" id="panel0">
                                    <div class="grid-container">
                                        <div class="grid-x grid-margin-x">
                                          <div class="small-12 cell">
                                            <div class='h3 fancy-header text-left'>All Departments</div>
                                          </div>
                                            <?php $entries = get_posts(
                                                    array(
                                                        'post_type' => 'directory',
                                                        'posts_per_page' => -1,
                                                        'meta_key' => 'directory_last_name',
                                                        'orderby' => 'meta_value',
                                                        'order' => 'ASC',
                                                        'meta_query' =>array(
                                                          array(
                                                        			'key'	  	=> 'hide_from_directory',
                                                        			'value'	  	=> '0',
                                                        			'compare' 	=> '=',
                                                        	),
                                                        )
                                                    ));
                                            if ($entries) : ?>
                                                <?php $types = get_field('directory_classification', 'option');?>

                                                <?php foreach($types as $type) :
                                                    $the_type = $type->name;
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
                                                    <!-- Get all posts       -->
                                                    <?php foreach($entries as $post) :
                                                          setup_postdata($post);?>
                                                          <!-- If post has the classification term, show -->
                                                           <?php if(has_term( $the_type, 'entry_type' )) :?>
                                                              <div class="small-12 large-4 cell text-left large-text-center">

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
                                                            <?php endif;?>

                                                  <?php endforeach; wp_reset_postdata();  ?>

                                                <?php endforeach;?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php $terms = get_field('directory_navigation', 'option');

                        if( $terms ): $i = 1;  ?>

                            <?php foreach( $terms as $term ): ?>
                                <div class="tabs-panel" id="panel<?php echo $i; ?>">
                                    <div class="grid-container">
                                        <div class="grid-x grid-margin-x">
                                          <div class="small-12 cell">
                                            <div class='h3 fancy-header show-for-large'><?php echo $term->name; ?></div>
                                          </div>
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
                                                              'terms' => $term->term_taxonomy_id, // Where term_id of Term 1 is "1".
                                                            )
                                                          )
                                                        )
                                                    );
                                            if ($entries) : ?>
                                                <?php $types = get_field('directory_classification', 'option');?>

                                                <?php foreach($types as $type) :
                                                    $the_type = $type->name;
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
                                                    <!-- Get all posts       -->
                                                    <?php foreach($entries as $post) :
                                                          setup_postdata($post);?>

                                                          <!-- If post has the classification term, show -->
                                                           <?php if(has_term( $the_type, 'entry_type' )) :?>
                                                              <div class="small-12 large-4 cell text-left large-text-center">

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
                                                            <?php endif;?>

                                                  <?php endforeach; wp_reset_postdata();  ?>

                                                <?php endforeach;?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>

                    </main> <!-- end #main -->


            </div> <!-- end #inner-content -->

    </div> <!-- end #content -->


<?php get_footer(); ?>
