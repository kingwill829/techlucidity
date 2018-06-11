<?php get_header(); ?>

<div class="container">
	<main class="col-md-12">
		<h1>Heading</h1>
			<?php
			    $args = array(
		        'post_type' => 'reviews',
		        'posts_per_page' => -1,
		        'orderby' => 'date',
		        'order' => 'DESC',
		        'post__not_in' => array( get_the_ID() )             
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



<?php get_footer(); ?>