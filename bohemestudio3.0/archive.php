<?php get_header(); ?>


				<section id="page" class="see-all archive-category">
				
					<header>
						<h3>
							Photo gallery > Archive > 
							<strong>
								<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					 	  		<?php /* If this is a category archive */ if (is_category()) { ?>
								<?php single_cat_title(); ?>
					 		  	<?php } ?>
							</strong>
						</h3>
					</header>

					<ul>

		        	<?php if (have_posts()) : ?>
		            <?php while (have_posts()) : the_post(); ?>
		            <?php 
							$image = "";
							$first_image = $wpdb->get_results(
							
							"SELECT guid FROM $wpdb->posts WHERE post_parent = '$post->ID' "
							."AND post_type = 'attachment' ORDER BY `post_date` ASC LIMIT 0,1"
							
							);
							
							if ($first_image) {
								$image = $first_image[0]->guid;
							}
		                	?>
		                	
			        	<li>
			           		<a href="<?php the_permalink() ?>" rel="<? bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image; ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
			            </li>
            		<?php endwhile; ?>
            		</ul>
            		
		            <div class="navigation">
						<div class="alignleft"><?php next_posts_link('Older') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer') ?></div>
					</div>
            		<?php endif;?>
	            </section> <!-- end #page .archive-category-->

<?php get_footer(); ?>