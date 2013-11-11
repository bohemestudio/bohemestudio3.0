<?php get_header(); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<section id="page">

					<h2 class="page-title">
						photo >
						<?php
							foreach((get_the_category()) as $category) {
							    echo '<a href="#category-photos">' . $category->cat_name . '</a> ';
							}
						?>
					</h2>

					<article id="main-photo">
						<header>
							<h3><?php the_title(); ?></h3>
						</header>

			        	<div class="photo-content">
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
							<img src="<? echo $image ?>" alt="<? the_title(); ?>" title="<? the_title(); ?>" />

							<p id="photo-info">
								<?php the_title(); ?>
								<span>&copy; MigueARG & bohemestudio.com all rights reserved</span>
							</p>

							<nav>
								<div class="nav-photo-left"><?php next_post_link('%link', '&nbsp;', TRUE); ?></div>
								<div class="nav-photo-right"><?php previous_post_link('%link', '&nbsp;', TRUE); ?></div>
							</nav>
			            </div>

					</article> <!--main-photo-->

					<section id="category-photos" class="see-all">

						<h3>related photos > <?php the_category(', '); ?></h3>

						<ul>
							<?php global $post;
							$categories = get_the_category();
							foreach ($categories as $category) :
							?>


							<?php
							$posts = get_posts('numberposts=40&category='. $category->term_id);
							foreach($posts as $post) :
							?>
							<li>
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

								<a href="<?php the_permalink() ?>" rel="<? bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image; ?>">
									<?php the_post_thumbnail('thumbnail'); ?>
								</a>
							</li>
							<?php endforeach; ?>

							<?php endforeach; ?>
						</ul>
						<div class="clear"></div>
					</section>

	            </section> <!-- end #page -->

	            <?php endwhile; else: ?>
					<h2>Sorry, no posts matched your criteria.</h2>
				<?php endif; ?>

<?php get_footer(); ?>