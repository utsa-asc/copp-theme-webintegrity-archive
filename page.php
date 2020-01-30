<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
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
            <div class="inner hero dept-hero colored template-page" style="background-image: url(<?php echo $image; ?>);">
                <div class="gradient">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x text-center">
                            <div class="cell">
                                <div class='h1'><?php the_title(); ?></div>
                                <?php if (get_field('page_description')) :?>
                                  <p><?php the_field('page_description'); ?></p>
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
              <section class="grid-container">
                <div class="grid-x grid-margin-x grid-padding-x">
                    <div class="small-12 cell">
                      <?php
                        $this_title = get_the_title();
                        if ($this_title == $dept_title):
                          $dept_title = '';
                        else:
                          $this_title = $this_title . ' - ' . $dept_title;
                        endif;
                       ?>
                        <div class='h2 fancy-header'><?php echo $this_title; ?></div>
                    </div>
                </div>
                <div class='grid-x grid-margin-x grid-padding-x'>
                    <div class="inner-content small-12 large-9 cell">

                        <?php if(have_rows('default_flex')) : ?>
                            <?php while(have_rows('default_flex')) : the_row(); ?>

                                <?php if(get_row_layout() == "df_header_layout"):?>
                                    <section class="df-header-layout">
                                        <!--<div class="grid-container">-->
                                            <div class='grid-x grid-margin-x'>
                                                <div class='auto cell'>
                                                    <div class='h2 fancy-header'><?php the_sub_field('df_header') ?></div>
                                                </div>
                                            </div>
                                        <!--</div>-->
                                    </section>
                                <?php elseif(get_row_layout() == "df_wysiwyg_layout"):?>
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
                                    <section class="df-accordion-layout">
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

                                <?php endif;?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div> <!-- end #inner-content -->
                    <?php $menu = get_field('default_sidebar_menu'); ?>
                    <div class="small-12 large-3 cell">
                        <div class="default-page-sidebar">
                            <?php
                            $add_menu = get_field('add_menu');
                             if($add_menu) :?>
                                <?php wp_nav_menu( array( 'menu' => $menu,'menu_id' => 'default-sidebar-menu' ) ); ?>
                             <?php endif;?>
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </section>
 <?php endwhile; endif; ?>
<?php get_footer(); ?>
