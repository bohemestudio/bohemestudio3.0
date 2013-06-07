<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

				<section id="page" class="about">
					<header>
						<hgroup>
							<h2><? the_title(); ?></h2> 
							<h3>WELCOME TO <a href="http://bohemestudio.com">bohemestudio.com</a> AND THANKS FOR YOUR VISIT ! :)</h3>
						</hgroup>
					</header>				

					<section id="about-content">
					
						<article id="about-mobile">
							<header>
								<h3>Mobile Boheme Studio:</h3>
							</header>
							<p>
								You are visiting the mobile-friendly website. We are sorry but some sections are not available in this version.							</p>
							<p>
								Do not hesitate to visit bohemestudio again on your desktop to enjoy enhanced features.
							</p>
						</article>	
											
						<article id="about-left">
							<header>
								<h3>The Photographer:</h3>
							</header>
							<p>
								I am Miguel ARG, web developer, graphic and interactive designer who loves photography.							</p>
							<p>								In this website my most relevant photo-work and graphic design. I have also included a section with the pics I share on Instagram, facebook and twitter as @bohemestudio and with some works on video editing.
							</p>
						</article>
						
						<article id="about-central">
							<header>
								<h3>Boheme Studio:</h3>
							</header>
							<p>
								The website is an online portfolio, a vision of the world, a shoebox full of frozen moments. I hope you enjoy my photos around the world.							</p>
							<p>
								You will find several photo galleries, so select one and if you like it then, please try the next one!.
							</p>
						</article>
						
						<article id="about-right">
							<header>
								<h3>Contact:</h3>
							</header>
							<p>
								Follow <strong>@bohemestudio</strong>! Share photos and be aware about the latest additions!							</p>
							<p>								Contact us at: <a href="mailto:contact@bohemestudio.com">contact@bohemestudio.com</a>					
							</p>
						</article>
						
						<div class="clear"></div>
					</section>
		
					<div id="whats-new">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		               	 	<?php the_content(); ?>
							<?php endwhile; else: ?>
								<p>Sorry, no posts matched your criteria.</p>
						<?php endif; ?>
					</div>
	            </section> <!-- end #page .video -->					

<?php get_footer(); ?>