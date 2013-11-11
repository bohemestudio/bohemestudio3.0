<?php
/*
Template Name: Video
*/
?>

<?php get_header(); ?>

				<section id="page" class="video">
				
					<header>
						<h3><? the_title(); ?></h3>
						<nav id="video-navigation">
							<ul>
								<li class="video-active"><a class="eva-comic" href="#"><span>Eva's comic life</span></a></li>
								<li><a class="alta-fidelidad" href="#"><span>Alta fidelidad</span></a></li>
								<li><a class="bienvenido-final" href="#"><span>Bievenido al final</span></a></li>
							</ul>
						</nav>
					</header>
	
					<article class="eva-comic-content">
						<iframe src="http://player.vimeo.com/video/5412933?portrait=0&amp;color=ff9933" width="720" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						<p> Eva’s comic life! - Music clip <span> tr_films 2008 </span></p>
					</article>
					
					<article class="alta-fidelidad-content">
						<iframe width="720" height="350" src="http://www.youtube.com/embed/NT2f1_SDrpU" frameborder="0" allowfullscreen></iframe>
						<p> Lori Meyers - Alta fidelidad - Music clip <span> tr_films 2008 </span></p>
					</article>
					
					<article class="bienvenido-final-content">
						<iframe width="720" height="350" src="http://www.youtube.com/embed/-mjlRDm9FVI" frameborder="0" allowfullscreen></iframe>
						<p> Bienvenido al final - Shortfilm <span> tr_films 2005 </span></p>
					</article>

	            </section> <!-- end #page .video -->


<?php get_footer(); ?>