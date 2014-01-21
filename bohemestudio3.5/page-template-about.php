<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

				<section id="page" class="about">
					<header>
						<h2><? the_title(); ?></h2>
						<h3>WELCOME TO <a href="http://bohemestudio.com">bohemestudio.com</a> AND THANKS FOR YOUR VISIT! :)</h3>
					</header>

					<section id="about-content">

						<article id="about-mobile">
							<header>
								<h3>Mobile Boheme Studio:</h3>
							</header>
							<p>
								You are visiting the responsive site. We are sorry but some sections and features are not available in this version.
							</p>
							<p>
								Do not hesitate to visit bohemestudio again on your desktop to enjoy enhanced features.
							</p>
						</article>

						<article id="about-left">
							<header>
								<h3>The Photographer:</h3>
							</header>
							<p>
								I am Miguel ARG, Front-end developer, graphic and interactive designer who loves photography.
							</p>
							<p>
								Bohemestudio is a personal project completely developed and designed to show you some of my Front-end developer and UX/Graphic designer skills.
							</p>
							<p>
								In this site I have used one of my hobbies, the photography, to build and web project and exhibit my most relevant photo-work. <br />
								You can also follow me in social networks as @bohemestudio.
							</p>
						</article>

						<article id="about-central">
							<header>
								<h3>Boheme Studio:</h3>
							</header>
							<p>
								The website is an online portfolio, a vision of the world, a shoebox full of frozen moments.
							</p>
							<p>
								The DEVELOPMENT page contains several galleries and links to some projects I've been working on (only available on the desktop version). <br />
							</p>
							<p>
								You will find several photo galleries that I hope you enjoy, our world through my eyes. To find out more about my work as a Front-end developer, please visit other the sections.
							</p>
						</article>

						<article id="about-right">
							<header>
								<h3>Contact:</h3>
							</header>
							<p>
								If you want to know more about me, you can like me on <a href="http://www.facebook.com/socialbohemestudio">Facebook</a> or follow me on <a href="https://twitter.com/bohemestudio">Twitter</a> or <a href="http://instagram.com/bohemestudio">Instagram</a>.
							</p>
							<p>
								Follow <strong>@bohemestudio</strong> to be aware of the latest additions! Remember that you can also share what you find interesting in your favorite social network.
							</p>
							<p>
								I appreciate your feedback, comments or professional contact.
								Do not hesitate to email me at: <a href="mailto:contact@bohemestudio.com">contact@bohemestudio.com</a>
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