<?php
/*
Template Name: News - Child Page
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
<div class="inner hero dept-hero colored template-child-news" style="background-image: url(<?php echo $image; ?>);">
    <div class="gradient">
        <div class="grid-container">
            <div class="grid-x grid-margin-x text-center">
                <div class="cell">
                    <div class='h1'><?php echo $dept_title; ?></div>
                    <?php if ($desc) :?>
                      <p><?php echo $desc; ?></p>
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

<div class="grid-container ">
  <div class="grid-x grid-margin-x grid-padding-x">
      <div class="small-12 cell">
          <div class='h2 fancy-header'><?php the_field('news_header'); ?> - <?php echo $dept_title; ?></div>
      </div>
  </div>
  <div class="grid-x grid-margin-x research-container">
  <?php
  $dept = get_field('news_department');
  $args = array('posts_per_page' => 50,
    'post_type' => 'post',
    'tax_query' => array(array('taxonomy' => 'entry_dept',
      'field' => 'term_id',
      'terms' => $dept,)));
  $loop = new WP_Query( $args );
  if ($loop->have_posts()) :
    while( $loop->have_posts() ): $loop->the_post();
        $img_id = get_post_thumbnail_id(get_the_ID()); ?>
        <?php $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
        <div class='small-12 cell news-box'>
          <div class='grid-x align-middle'>
            <div class='small-2 large-1 cell'>
                <div class='news-date'><?php the_time('M'); ?><br><span><?php the_time('d'); ?></span></div>
            </div>
            <div class='small-10 large-3 cell'>
              <a href='<?php the_permalink(); ?>' aria-label="<?php echo $alt_text; ?>">
                <div class='news-image background' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
              </a>
            </div>
            <div class='small-12 large-5 cell text-center large-text-left'>
              <a href='<?php the_permalink(); ?>'>
                <div class='news-info'>
                  <div class='h5'><?php the_title(); ?></div>
                </div>
              </a>
            </div>
            <div class='small-12 large-3 cell text-center'>
              <a href='<?php the_permalink(); ?>' class='button transparent' aria-label="Read more about the news article">Read More</a>
            </div>
          </div>
        </div>
        <hr>
      <?php endwhile; ?>
    <?php else: ?>
      <div class='small-12 cell news-box'>
        <div class='grid-x align-middle'>
          <div class='small-12 large-5 cell text-center large-text-left'>
              <div class='news-info'>
                <div class='h5'>No Recent News</div>
              </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
 </div>
</div>
<?php endwhile; endif;
get_dept_footer($dept_title, true);
get_footer(); ?>
