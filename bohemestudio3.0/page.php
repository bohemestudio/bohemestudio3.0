<?php get_header(); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<section id="page">
					<header>
						<h2><? the_title(); ?></h2>
					</header>
					
					
					<?php the_content(); ?>
					
					<?php endwhile; else: ?>
						<p>Sorry, no posts matched your criteria.</p>
					<?php endif; ?>
				</section> <!-- end #page -->

<?php get_footer(); ?>