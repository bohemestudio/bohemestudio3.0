<?php
/*
Template Name: All
*/
?>

<?php get_header(); ?>


				<section id="page" class="see-all">

					<h3>Archive > <strong>all</strong></h3>

			 		<ul>
					<?php
						$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
						if (0 < $numposts) $numposts = number_format($numposts);
					?>


					 <?php $myposts = get_posts('numberposts=-1&');
					 foreach($myposts as $post) : ?>

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
			            	<a href="<?php the_permalink() ?>" rel="<?php echo $image; ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
			            </li>
				 	<?php endforeach; ?>
					</ul>
				</section> <!-- end #see-all -->


<?php get_footer(); ?>