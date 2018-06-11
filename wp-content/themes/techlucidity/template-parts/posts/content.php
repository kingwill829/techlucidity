		<div class="listings__item">	
			<div class="listings__item-image">
				<a href="<?php the_permalink() ?>">
				<?php 
					$post_thumbnail = get_field('post_thumbnail'); 
					if ( !empty($post_thumbnail)) {
						// vars
						$url = $post_thumbnail['url'];
						$title = $post_thumbnail['title'];
						$alt = $post_thumbnail['alt'];
						$caption = $post_thumbnail['caption'];
						$width = $post_thumbnail['width'];
						$height = $post_thumbnail['height'];						
					}
				?>
		
				<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				</a>
			</div>
			<div class="listings__item-info">
				<h2 class="listings__item-title"><a href="<?php the_permalink() ?>"> <?php the_title() ;?></a></h2>	

 				<?php 
					if (get_field('summary__rating')) {
						echo "<div>";
						createStars('summary__rating');
						echo "</div>";
					}
			 	
 				 ?>

				<?php 
					if(get_field('post_snippet')) {
						echo "<p>" . the_field('post_snippet') . "</p>"; 
						}
				?>
				<div class="listings__item-published tar"><?php echo get_the_date(); ?></div>
			</div>
		</div>
		

			
