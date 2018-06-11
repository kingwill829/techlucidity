					<?php

						$result = $counter . " - " . get_sub_field('text_block_heading'); 
					?>
				
					<li>
						<a href="#<?php echo the_sub_field('text_block_heading'); ?>"><?php echo $result; ?></a>
					</li>

					<?php $counter++; ?>