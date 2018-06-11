<div class="content-review__cat-ratings-item marb_d">
	<h3><?php echo the_sub_field('review_category'); ?> - <span class=""><?php echo the_sub_field('review_category_rating'); ?></span></h3>
	<div>
		<?php
			$count = get_sub_field('review_category_rating', false, false) * 10;

			$output = '<svg width="100%" height="2px"><rect width="' . $count . '%" height="100" style="fill:rgb(189,212,222);stroke-width:3;stroke:rgb(189,212,222)" /></svg>';
			echo $output;
		?>
	</div>
</div>
