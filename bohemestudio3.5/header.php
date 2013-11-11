<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html style="margin: 0 !important; color: #ffffff;">  <!--<![endif]-->

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php bloginfo('name'); ?> | Photography website</title>

		<link rel="shortcut icon" href="http://www.bohemestudio.com/images/favicon.ico" />
			<!-- STYLES SECTION -->

			<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory") ?>/css/reset.css" />

		    <link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.5-base.css' />
		    <link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.5-enhanced.css' media='all and (min-width: 800px)' />

		    <!--[if lt IE 9]>
				<link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.2-enhanced.css' />
			<![endif]-->

		    <!-- PLUGINS -->
			<link rel='stylesheet' id='NextGEN-css'  href='http://bohemestudio.com/wp-content/plugins/nextgen-gallery/css/nggallery.css?ver=1.0.0' type='text/css' media='screen' />
			<link rel='stylesheet' id='arthref-css'  href='http://bohemestudio.com/wp-content/themes/bohemestudio3.0/js/socialShare/arthref.css' type='text/css' media='screen' />

			<!-- Internet Explorer HTML5 enabling code: -->
			<!--[if lte IE 6]>
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

				<style type="text/css">
				.clear {
					zoom: 1;
					display: block;
				}
				</style>
			<![endif]-->

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>


	</head>

	<body>

		<!--[if lte IE 8]>

			<style>
				#overlay-content a,
				#overlay-content a:visited{
					color: #D9561C;
				}
			</style>

			<div id="overlay" style="position:fixed; width:100%; height: 100%; background: #fff; z-index: 1000; top: 0; left: 0;">
			<div id="overlay-content"  style="color: #000; position: relative; top: 45%; text-align: center;" >Hi! It seems that you are using Internet Explorer to visit <b>bohemestudio.com</b> <br/><br/>Sorry about that but bohemestudio do not support Internet Explorer 8 and older versions :( <br/>Tip: use <a href="https://www.google.com/chrome/" title="">Chrome</a>, <a href="http://www.mozilla.org/" title="Get Firefox">Firefox</a>, Safari or a newer Internet explorer instead. <br/><br/> Sorry for any inconvenience.<span> <a href="mailto:contact@bohemestudio.com">contact@bohemestudio.com</a></span></div>
			</div>
		<![endif]-->

		<header>

			<div id="main-header">
				<header>
					<h1>
						<span> <?php bloginfo('name'); ?> <?php bloginfo('description'); ?></span>
						<a href="<?php echo get_option('home'); ?>">
							<img src="images/logo_bohemestudio.png" alt="Boheme studio" title="Boheme studio" />
						</a>
					</h1>
				</header>
			</div>

			<div id="main-navigation">
				<nav>
		            <ul>
		            	<li>
		            		<a href="<?php echo get_option('home'); ?>" accesskey="1" <?php if( is_home()) : ?> class="active" <?php endif; ?> title="Back to Frontpage">home</a>
		            	</li>
						<?php
						if( is_page() ) $curpage = $post->ID;
						$pages = get_pages('sort_column=menu_order');
						foreach( $pages as $page ) {
							$this_css = '';
							$this_link = get_page_link($page->ID);
							if( $curpage == $page->ID ) $this_css = ' class="active"';
							echo "<li><a $this_css href=\"$this_link\">" . $page->post_title . "</a></li>\n\t\t";
						} ?>
		            </ul>
				</nav>
			</div>

			<div id="mobile-navigation">
				<nav>
		            <ul>
		            	<li><a href="http://bohemestudio.com" title="Home page">home</a></li>
		            	<li><a href="http://bohemestudio.com/see-all" title="See all page">see all</a></li>
		            	<li><a href="http://bohemestudio.com/about" title="About page">about</a></li>
		            </ul>
				</nav>
			</div>

			<div id="main-separator">

				<h2>Welcome to the bohemestudio Photo galleries!</h2>
				<div id="gallery-navigation">
					<nav class="wrapper">
						<ul class="cats">
	            			<?php wp_list_categories('title_li='); ?>
	           			 </ul>
					</nav>

					<div class="clear"></div>
				</div> <!-- end #gallery-navigation -->
			</div>

		</header>


		<div id="bohemestudio-content">

			<div id="content">
