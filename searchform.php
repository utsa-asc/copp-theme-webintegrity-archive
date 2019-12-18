<?php
/**
 * The template for displaying search form
 */
 ?>
<?php if( (is_singular('directory')) || (is_post_type_archive('directory')) ) : ?>
     <form role="search" method="get" class="directory-search-form" action="<?php echo home_url( '/' ); ?>">
     	<label>
     		<span class="screen-reader-text"><?php echo _x( 'Search:', 'label', 'jointswp' ) ?></span>
     		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type Here', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
     	</label>
      <input type='hidden' name="post_type" value="directory">
     </form>
<?php elseif( (is_single()) || (is_archive()) || (is_search()) ) :?>
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    	<label>
    		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'jointswp' ) ?></span>
    		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
    	</label>
      <input type='hidden' name="post_type" value="post">
    	<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" />
    </form>
<?php endif; ?>
