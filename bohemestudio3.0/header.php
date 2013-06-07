<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html style="margin: 0 !important; color: #ffffff;">  <!--<![endif]-->

	<head>


		<meta name="viewport" content="width=device-width,initial-scale=1.0" />

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php bloginfo('name'); ?> | Photography website</title>

		<link rel="shortcut icon" href="http://www.bohemestudio.com/images/favicon.ico" />
			<!-- STYLES SECTION -->
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory") ?>/css/reset.css" />

		    <link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.1-base.css' />

		    <link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.1-enhanced.css' media='all and (min-width: 800px)' />
		    <!--[if lt IE 9]>
				<link rel='stylesheet' href='<?php bloginfo("template_directory") ?>/css/bohemestudio3.1-enhanced.css' />
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

			<!-- SCRIPTS SECTION

			<script src="<?php bloginfo("template_directory") ?>/js/jQuery-v1.8.2.min.js" type="text/javascript"></script>
			<script src="<?php bloginfo("template_directory") ?>/js/bohemestudio3.1.js" type="text/javascript"></script>


			<script src="<?php bloginfo("template_directory") ?>/js/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>
			<script type="text/javascript">
					Shadowbox.init({
					    handleOversize: "drag",
					    modal: false
					});
			</script>

			 -->

	</head>

	<body>

		<!--[if lte IE 6]>
			<div id="overlie" style="position:absolute; with:100%; height: 100%; background: #fff;">
			<div id="ifie"  style="color: #000;" >Hi! It seems that you are using Internet Explorer to visit my website. That's no fun. <br/><br/>Internet Explorer isn't that nice to my site :( <br/>Tip: use <a href="https://www.google.com/chrome/" title="">Chrome</a> or <a href="http://www.mozilla.org/" title="Get Firefox">Firefox</a> instead. Thanks!<br/><br/><span><a href="#" onclick="hide('ifie'),hide('overlie')">Close</a></span></div>
			</div>
		<![endif]-->

		<header>

			<div id="main-header">
				<header>
					<h1>
						<span> <?php bloginfo('name'); ?> <?php bloginfo('description'); ?></span>
						<a href="<?php echo get_option('home'); ?>">
							<img src="../images/bohemestudio_logo.png" alt="Boheme studio" title="Boheme studio" />
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
				<header>
					<h2>Welcome to boheme studio!</h2>
				</header>
			</div>

		</header>


		<div id="bohemestudio-content">

			<div id="gallery-navigation">

				<nav>
					<header>
						<h2>
							<span>Photo galleries</span>
							<span id="category-icon">&nbsp;</span>
						</h2>
					</header>
					<ul class="cats">
            			<?php wp_list_categories('title_li='); ?>
           			 </ul>
				</nav>

				<div class="clear"></div>
			</div> <!-- end #gallery-navigation -->

			<div id="content">