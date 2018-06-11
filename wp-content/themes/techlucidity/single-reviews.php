<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="container">
	<main class="col-md-8">
		<div class="content-body content-review">
			<h1><?php esc_html(the_title()); ?></h1>
			<h3><?php esc_html(the_field('sub_heading')); ?></h3>
			<p class="content-body__published"><?php echo get_the_date(); ?></p>

			<div class="content-body__container marb_d">
				<h2 class="marb_d">Summary</h2>

				<div class="content-review__cat-ratings marb_d">
					 <?php 
						// check if the flexible content field has rows of data
						if( have_rows('review__ratings') ):

						     // loop through the rows of data
						    while ( have_rows('review__ratings') ) : the_row();
								if( get_row_layout() == 'review_ratings' ):
									
									get_template_part('template-parts/posts/custom/content', 'review-ratings');
								endif;

						    endwhile;

						endif;
				 	?>
				</div>
				
				<div class="content-review__star-rating">
					<h2>Our Verdict</h2>
	 				<?php createStars('summary__rating'); ?>

 				</div>
 				<p><?php the_field('review_summary'); ?></p>
			</div>

			<div class="content-review__top-summary marb_d">				
				<div class="content-review__top-summary-good pad_d">	
					<h2>Good</h2>
					<ul>
						<?php

							// check if the repeater field has rows of data
							if( have_rows('summary__good') ):

							 	// loop through the rows of data
							    while ( have_rows('summary__good') ) : the_row();
									
							        // display a sub field value
							        echo '<li><span class="fa fa-check" style="color:green"> </span>&nbsp;' . get_sub_field('summary__good_point') . '</li>';

							    endwhile;
							endif;

						?>
					</ul>
				</div>
				<div class="vertical-sep mob-xs_hide">
					<div class="vertical-sep__inner">
					</div>
				</div>
				<div class="content-review__top-summary-bad pad_d">         
					<h2>Bad</h2>
					<ul>
						<?php

							// check if the repeater field has rows of data
							if( have_rows('summary__bad') ):

							 	// loop through the rows of data
							    while ( have_rows('summary__bad') ) : the_row();

							        // display a sub field value
							        echo '<li><span class="fa fa-times" style="color:red"> </span>&nbsp;' . get_sub_field('summary__bad_point') . '</li>';

							    endwhile;
							endif;
						?>
					</ul>						
				</div>
			</div>

			<div class="tac">
				<?php 
					$hero_image = get_field('hero_image'); 
					if ( !empty($hero_image)) {
						// vars
						$url = $hero_image['url'];
						$title = $hero_image['title'];
						$alt = $hero_image['alt'];
						$caption = $hero_image['caption'];
						$width = $hero_image['width'];
						$height = $hero_image['height'];						
					}
				?>			
				<img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" />
			</div>


			<?php 

				// Table of contents
				createContentsTable(); 
				// Content body
				createContentBody();

			?>
		</div>
	</main>

<?php get_sidebar(); ?>

</div>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>