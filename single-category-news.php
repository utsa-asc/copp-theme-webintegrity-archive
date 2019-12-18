<?php
/**
 * The template for displaying all single posts and attachments
 */

if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner hero colored single-category-news" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x">
                            <div class="cell text-center">
                                <div class='h1'><?php the_title(); ?></div>
                                <?php if(get_field('page_description')) : ?>
                                  <p><?php the_field('page_description'); ?></p>
                                <?php endif; ?>
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
                      <div class='h2 fancy-header'><?php the_title(); ?></div>
                  </div>
              </div>
            </section>
            <div class="grid-container">
                <div class='grid-x grid-margin-x grid-padding-x'>
                    <div class="inner-content small-12 large-8 cell">

                        <?php if(have_rows('default_flex')) : ?>
                            <?php while(have_rows('default_flex')) : the_row(); ?>

                                <?php if(get_row_layout() == "df_wysiwyg_layout"):?>
                                    <section class="df-wysiwyg-layout">
                                        <!--<div class="grid-container">-->
                                            <div class='grid-x grid-margin-x'>
                                                <div class='auto cell'>
                                                    <?php the_sub_field('df_wysiwyg_content'); ?>
                                                </div>
                                            </div>
                                        <!--</div>-->
                                    </section>
                                <?php elseif(get_row_layout() == "df_hr_layout"):?>
                                    <hr>
                                <?php elseif(get_row_layout() == "df_accordion_layout"):?>
                                    <section class="df-accordion-layoute">
                                        <div class='grid-x grid-margin-x'>
                                            <div class='auto cell'>
                                                <?php if(have_rows('df_accordion')) : $i = 1;?>
                                                    <ul class="accordion" data-accordion>
                                                        <?php while(have_rows('df_accordion')) : the_row(); ?>
                                                            <li class="accordion-item <?php if($i == 1): echo 'is-active'; endif;?>" data-accordion-item>
                                                                <a href="#" class="accordion-title"><?php the_sub_field('df_accordion_title'); ?></a>

                                                                <div class="accordion-content" data-tab-content>
                                                                    <?php the_sub_field('df_accordion_content'); ?>
                                                                </div>
                                                            </li>
                                                        <?php $i++; endwhile; ?>
                                                     </ul>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div> <!-- end #inner-content -->
                    <div class="small-12 large-3 cell">
                        <div class="default-page-sidebar">
                            <?php dynamic_sidebar( 'news' ); ?>
                        </div>
                    </div>
                </div>
            </div>
 <?php endwhile; endif; ?>
<?php get_footer(); ?>
