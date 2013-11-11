<?php get_header() ?>

				<section id="featured">
					<h2>Featured pictures</h2>

					<div id="rotator">
		            	<ul id="photos">
		                    <?php query_posts('showposts='.wptp_getopt('slide_num', 0).'&cat='.wptp_getopt('slide_cat', 0).''); ?>
		                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
		                    <?php if(wptp_has_img()): $image = mooz_image_predata($post->ID); ?>

		                    <li>
		                    	<a href="<?php the_permalink() ?>">
<!--
		                    		<img src="<?php bloginfo('template_directory') ?>/scripts/timthumb.php?src=<?php echo $image['path']; ?>&w=870&h=340&zc=1" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
-->
									<img src="<?php echo $image['path']; ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
		                    	</a>
		                    </li>

		                    <?php endif; ?>
		                    <?php endwhile; endif; ?>
	            		</ul>
	          		</div>
	        	</section> <!-- end #featured -->

	        	<section id="latest-additions">

                	<h3>Portfolio latest Additions</h3>

					<ul>
		                <?php query_posts('showposts='.wptp_getopt('latest_num', 0).''); ?>
		                <?php if(have_posts()): while(have_posts()): the_post(); ?>
		                <li>
			                <?php if(wptp_has_img()): $image = mooz_image_predata($post->ID); ?>
							<a href="<?php the_permalink() ?>" rel="<?php echo $image['path']; ?>">
								<!--
								<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image['path']; ?>&w=200&h=100&zc=1" />
								-->
								<?php the_post_thumbnail('medium');?>
							</a>
			                <?php endif; ?>

		                </li>
						<?php endwhile; endif; ?>
					</ul>
					<div class="clear"></div>
				</section> <!-- end #latest-additions -->


<?php get_footer() ?>