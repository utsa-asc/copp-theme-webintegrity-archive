<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="inner hero colored single-directory" style="background-image: url(<?php the_field('directory_background_image', 'option');?>);">
        <div class="gradient">
                <div class="grid-container">
                    <div class="grid-x grid-margin-x text-center">
                        <div class="cell">
                            <h1>Directory</h1>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <section class='directory-nav'>
      <div class="grid-container">
        <div class="grid-x">
          <div class="small-12 medium-6 cell">
              <div class="directory-menu text-center">
                  <span>Filter By: </span><span id='filter-button'>Department <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                  <?php $terms = get_field('directory_navigation', 'option');

                      if( $terms ): $i = 1; ?>
                          <ul class="tabs hidden text-center"  id='example-tabs'>
                              <?php foreach( $terms as $term ): ?>
                                  <li class="tabs-title"><a data-tabs-target="panel<?php echo $i; ?>" href="/directory/#panel<?php echo $i; ?>" aria-selected="true"><?php echo $term->name; ?></a></li>
                                  <?php $i++; ?>
                              <?php endforeach; ?>
                          </ul>
                  <?php endif; ?>
              </div>
          </div>
          <div class="small-12 medium-6 cell text-right">
            <div class='directory-search'>
              <?php get_search_form( ); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="directory-main content">
<div class='grid-container'>
	<div class="inner-content grid-x grid-margin-x grid-padding-x">

            <div class="small-12 cell">
                <div class="directory-block dir-single">
                    <div class="dir-header">
                        <div class='grid-x grid-margin-x'>
                            <div class='cell small-12 large-2 text-center'>
                                <?php if(get_field('directory_alt_image')) : ?>
                                    <span class="dir-image transition" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>);" ></span>
                                    <span class="alt-image transition" style="background-image: url(<?php the_field('directory_alt_image'); ?>);"></span>
                                <?php else :?>
                                    <span class="dir-image" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>);" ></span>
                                <?php endif; ?>
                            </div>
                            <div class='small-12 medium-auto cell'>
                                <span class="dir-info">
                                    <h3><?php the_title(); ?></h3>
                                    <?php if(get_field('directory_title')): ?>
                                        <p class='title'><?php the_field('directory_title'); ?></p>
                                    <?php else:?>
                                        <p class='title'>Professor</p>
                                    <?php endif; ?>
                                        <a href="mailto:<?php the_field('directory_email_address'); ?>" title="Email <?php the_title(); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php the_field('directory_email_address'); ?></a><br>
                                        <a href="tel:<?php the_field('directory_phone_number'); ?>" title="Call <?php the_title(); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('directory_phone_number'); ?></a><br>
                                    <p><?php the_field('directory_building'); ?></p>
                                </span>
                            </div>
                            <div class='small-12 medium-auto cell'>
                                <?php if(get_field('directory_office_hours')) :?>
                                    <span class='office-hours'>
                                        <h6>Office Hours</h6>
                                        <p><?php the_field('directory_office_hours'); ?></p>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class='small-12 medium-auto cell'>
                                <?php if(get_field('directory_research_interests')) : ?>
                                    <span class='research'>
                                        <h6>Research Interests</h6>
                                        <p><?php the_field('directory_research_interests'); ?></p>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <ul class='dir-nav grey-background'>
                        <?php if(have_rows('directory_content_repeater')) : ?>
                            <li>Links & Resources</li>
                        <?php endif; if(get_field('directory_curriculum_vitae_source')) :?>
                            <li><a href="<?php the_field('directory_curriculum_vitae_source');?>" title="View Curriculum Vitae">Curriculum Vitae</a></li>
                        <?php endif; if(get_field('directory_resource_source')) : ?>
                            <li><a href="<?php the_field('directory_resource_source');?>" title="View Research Blog" >Research Blog</a></li>
                        <?php endif; if(get_field('directory_vcard_source')) :?>
                            <li><a href="<?php the_field('directory_vcard_source');?>" title="View V Card">V Card</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class='dir-content'>
                        <?php if(have_rows('directory_content_repeater')) : ?>
                            <div class="grid-container">
                                <div class="grid-x grid-margin-x">
                                    <?php while(have_rows('directory_content_repeater')) : the_row(); ?>
                                    <div class="small-12 large-4 cell">
                                        <h6><?php the_sub_field('directory_content_header'); ?></h6>
                                    </div>
                                    <div class="small-12 large-8 cell">
                                        <?php the_sub_field('directory_content'); ?>
                                    </div>

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>


            </div>

	</div> <!-- end #inner-content -->
</div>
</div> <!-- end #content -->
<?php endwhile; endif; ?>

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

<?php get_footer(); ?>
