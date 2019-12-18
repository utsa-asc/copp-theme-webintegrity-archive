<?php
/*
Template Name: Full Width (No Sidebar)
*/


if(get_field('header_image')) {
    $image = get_field('header_image');
} else {
     $image =  get_field('banner_image', 'option');
}

get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inner hero colored template-full-width" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x">
                            <div class="cell">
                                <div class='h2'><?php the_title(); ?></div>
                                <?php if (get_field('page_description')) :?>
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

	<div class="content">
            <div class="grid-container">
                <div class='grid-x grid-margin-x'>
                    <div class="inner-content small-12 cell">

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
                                <?php elseif(get_row_layout() == "df_slider_layout"):?>
                                    <section class="df-slider-layout">
                                        <!--<div class="grid-container">-->
                                            <div class='grid-x grid-margin-x'>
                                                <div class='auto cell'>
                                                    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
                                                        <div class="orbit-wrapper">
                                                            <ul class="orbit-container">
                                                                <?php
                                                                $images = get_field('df_slider_images');
                                                                $i = 0;
                                                                if($images) :
                                                                    foreach($images as $image) :?>
                                                                        <li class="orbit-slide <?php if($i == 0):echo 'is-active'; endif; ?>">
                                                                            <img class="orbit-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                                                        </li>
                                                                <?php $i++; endforeach;endif;?>
                                                            </ul>
                                                        </div>
                                                        <nav class="orbit-bullets">
                                                            <?php
                                                            $count = 0;
                                                            while($count < $i): ?>
                                                                <button data-slide="<?php echo $count; ?>" class="<?php if($count == 0):echo 'is-active'; endif; ?>"><span class="show-for-sr">Fourth slide details.</span></button>

                                                            <?php $count++; endwhile;?>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--</div>-->
                                    </section>
                                <?php elseif(get_row_layout() == "df_hr_layout"):?>
                                    <hr>
                                <?php elseif(get_row_layout() == "df_styled_images_layout"):?>
                                    <section class="df-styled-images-layout">
                                        <div class='grid-x grid-margin-x'>
                                            <div class='small-12 large-3 cell'>
                                                <div class="image-container">
                                                    <?php $images = get_field('df_styled_images');

                                                    if( $images ): $img_num = 0; ?>
                                                        <?php foreach( $images as $image ): ?>
                                                            <div class="image-<?php echo $img_num ?>">
                                                                <a href="<?php echo $image['url']; ?>">
                                                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                                                                </a>
                                                            </div>
                                                        <?php $img_num++; endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
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
                </div>
            </div>
	</div> <!-- end #content -->
 <?php endwhile; endif; ?>
<?php get_footer(); ?>
