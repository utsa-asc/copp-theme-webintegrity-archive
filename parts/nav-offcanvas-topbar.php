<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar restricted-width grid-x grid-margin-x grid-padding-x align-middle" id="top-bar-menu">
	<div class="small-6 large-2 cell">
		<ul class="menu">
			<li>
                            <a href="<?php echo home_url(); ?>">
                            <?php

                                $image = get_field('header_logo', 'option');

                                if( !empty($image) ): ?>

                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="header-logo"/>

                                <?php endif; ?>
                            </a>
                        </li>
		</ul>
	</div>

	<div class="auto cell top-bar-right show-for-large text-right">
		<?php joints_top_nav(); ?>
	</div>

	<div class="small-6 cell float-right text-right hide-for-large">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><i class="fa fa-bars" aria-hidden="true"></i> <?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
        </div>
</div>
