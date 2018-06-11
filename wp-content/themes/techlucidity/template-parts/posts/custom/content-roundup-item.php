			<section class="content-body__round-up-item marb_d">
				<h2><?php the_sub_field('round_up_item_title'); ?></h2>
				<div><?php createStars('round_up_item_summary'); ?></div>
				<div class="marb_d"><?php the_sub_field('round_up_item_text'); ?></div>
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<?php 
							$content_image = get_sub_field('round_up_item_image'); 
							if ( !empty($content_image)) {
								// vars
								$url = $content_image['url'];
								$title = $content_image['title'];
								$alt = $content_image['alt'];
								$caption = $content_image['caption'];
								$width = $content_image['width'];
								$height = $content_image['height'];						
							}
							if ($content_image ): ?>
								<div class="tac">
									<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
								</div>
							<?php endif; 

							$amazon_image = get_sub_field('round_up_item_associate_image');
							if ($amazon_image) {
								echo "$amazon_image";	
								}
							 ?>
							
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="content-body__round-up-item-summary marb_d">	
							<div>
								<ul>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('roundup_good_point') ):

										 	// loop through the rows of data
										    while ( have_rows('roundup_good_point') ) : the_row();
												
										        // display a sub field value
										        echo '<li><div><span class="fa fa-check" style="color:green"> </span></div><div>' . get_sub_field('roundup_good_point_item') . '</div></li>';

										    endwhile;
										endif;
									?>
								</ul>
							</div>

							<div>
								<ul>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('roundup_bad_point') ):

										 	// loop through the rows of data
										    while ( have_rows('roundup_bad_point') ) : the_row();
												
										        // display a sub field value
										        echo '<li><div><span class="fa fa-times" style="color:red"> </span></div><div>' . get_sub_field('roundup_bad_point_item') . '<div></li>';

										    endwhile;
										endif;
									?>
								</ul>
							</div>
						</div>					
						<?php 
							$affiliate_link = get_sub_field('buy_link');

							if ($affiliate_link): ?>
							<div class="marb_d">
								<a href="<?php echo $affiliate_link[url]; ?>" target="_blank"><span class="fa fa-amazon">&nbsp;</span><?php echo $affiliate_link[title]; ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>


			</section>