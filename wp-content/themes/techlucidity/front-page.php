<?php get_header(); ?>

<div class="container">
	<div class="col-md-9">
		<main class="listings">
			<?php
			    $args = array(
		        'post_type' => array('reviews','post','revisions','articles','roundups'),
		        'posts_per_page' => -1,
		        'orderby' => 'date',
		        'order' => 'DESC'            
		        ); 

				$loop = new WP_Query($args);
				
				if ( $loop->have_posts() ) :

					/* Start the Loop */
					while ( $loop->have_posts() ) : $loop->the_post();

						get_template_part( 'template-parts/posts/content', get_post_format() );

					endwhile;
				else : ?>

					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

				<?php endif;
			?>
		</main>
	</div>

	<aside class="col-md-3 tar">
	<?php
		get_template_part( 'inc/affiliate-assets/prime/prime_160-600');
	?>
	</aside>
</div>



<?php get_footer(); ?>