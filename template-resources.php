<?php
/**
 * Template Name: Resources
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="inner hero colored template-resources" style="background-image: url(<?php echo $image; ?>);">
            <div class="gradient">
                <div class="particles-light">
                        <div class="grid-container">
                            <div class="grid-x grid-margin-x">
                                <div class="cell">
                                    <h1><?php the_title(); ?></h1>
                                </div>
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
            <section class="grid-container ">
              <div class="grid-x grid-margin-x grid-padding-x">
                  <div class="small-12 cell">
                      <div class='h2 fancy-header'><?php the_field('resource_header'); ?></div>
                  </div>
              </div>
            </section>
            <div class="content particles">

                <div class="inner-content grid-container grid-x grid-margin-x grid-padding-x grid-padding-y">

                    <?php if(have_rows('resources_repeater')) :
                        while(have_rows('resources_repeater')) : the_row(); ?>

                            <div class='resources-container small-12 large-6 cell'>
                                <div class='resource-box' style='background-image: url(<?php the_sub_field('resource_image'); ?>);'>
                                    <div class='gradient'>
                                        <h4><?php the_sub_field('resource_title'); ?></h4>
                                        <?php if(have_rows('resource_links_repeater')) : ?>
                                            <ul class='resource-list'>
                                                <?php while(have_rows('resource_links_repeater')) : the_row(); ?>
                                                <li><a href='<?php the_sub_field('resource_link_url'); ?>' title='<?php the_sub_field('resource_link_text');?>' ><?php the_sub_field('resource_link_text');?> <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                    <?php endwhile;endif; ?>

                </div> <!-- end #inner-content -->

            </div> <!-- end #content -->
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
