<?php

$dept_row = false;

// Adding WP Functions & Theme Support
function get_dept_footer($dept_title, $color) {
	if (have_rows('home_departments_repeater', 'option')):
		while(have_rows('home_departments_repeater', 'option')): the_row();
			$title = get_sub_field('title');
			$dtitle = get_sub_field('footer_title');
			//echo 'title: ' . $title . ' $dtitle: ' . $dtitle . '<br/>';
			if ($title == $dept_title):
				if ($dtitle != ''):
					//echo 'true <br/>';
					if ($color == true):
						echo '<section class="" style="background-color:#f9f9f9;padding-top:1.5em;">';
					else:
						echo '<section class="">';
					endif;
					echo '<div class="grid-container">';
					echo '<div class="grid-x grid-margin-x grid-padding-x">';
					echo '<div class="small-12 large-7 cell">';
					$footer_title = get_sub_field('footer_title');
					$phone = get_sub_field('phone');
					$fax = get_sub_field('fax');
					$location = get_sub_field('location');
					echo '    <div class="h3">' . $footer_title . '</div>';
					echo '<div class="date-container ">';
					echo '<span class="divider"></span><span class="alumni-date"></span>';
					echo'</div>';
	            echo '<p style="margin-top:0.5rem;">Phone: <strong>' . $phone . '</strong>';
							echo '<br/>Fax: <strong>' . $fax . '</strong>';
							echo '<br/>Location: <strong>' . $location . '</strong>';
							echo '<br/>The University of Texas at San Antonio';
							echo '<br/>One UTSA Circle';
							echo '<br/>San Antonio, TX 78249-1644';
							echo '</div>';
	            //echo '<p>Paragraph text goes here</p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</section>';
				endif;
			endif;
		endwhile;
	endif;
} /* end theme support */

/*
<section class="grid-container ">
  <div class="grid-x grid-margin-x grid-padding-x">
      <div class="small-12 cell">
          <div class="h2 fancy-header">Sociology – Research Centers</div>
      </div>
  </div>
</section>
*/
