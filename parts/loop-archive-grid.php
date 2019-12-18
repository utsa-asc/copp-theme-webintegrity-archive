<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

// Adjust the amount of rows in the grid
$grid_columns = 3; ?>

<?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <div class="grid-x grid-margin-x grid-padding-x archive-grid" data-equalizer> <!--Begin Grid-->

<?php endif; ?>

		<!--Item: -->

    <div class='small-12 medium-6 cell post-box'  data-equalizer-watch>
      <div class='post-date'><span><?php the_time('d'); ?></span><?php the_time('M'); ?></div>
      <?php if(has_post_thumbnail()) : ?>
        <a href='<?php the_permalink(); ?>'>
          <div class='post-image' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
        </a>
      <?php else : ?>
        <a href='<?php the_permalink(); ?>'>
          <div class='post-image' style='background-image: url(<?php the_field('placeholder', 'option') ?>);'></div>
        </a>
      <?php endif; ?>
      <div class='post-info'>
        <a href='<?php the_permalink(); ?>'>
          <div class='h5'><?php the_title(); ?></div>
          <?php the_excerpt(); ?>
        </a>
        <a href='<?php the_permalink(); ?>' class='text-link'>Read More &#8250;</a>
      </div>
    </div>


<?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   </div>  <!--End Grid -->

<?php endif; ?>
