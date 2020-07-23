<!DOCTYPE html>
<html lang="fa">
<head>
	<meta charset="utf-8" />
	<title><?php echo bloginfo('name'); ?><?php $wpTitle = wp_title(); if(!empty($wpTitle)) echo " | " . $wpTitle; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/lib/fontawesome/css/all.min.css" />
	<?php
		$font_site = get_option("amirBlog_font_input");
		$font_site = $font_site * 1;

		if($font_site==1)
			$font_name = 'vazir';
		elseif($font_site==2)
			$font_name = 'shabnam';
		elseif($font_site==3)
			$font_name = 'samim';
		else
			$font_name = 'vazir';

		$color_site = get_option("amirBlog_color_input");
		if(empty($color_site))
			$color_site = "#0f0e9f";
		if(!preg_match("/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/", $color_site))
			$color_site = "#0f0e9f";
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/fonts/<?php echo $font_name; ?>/<?php echo $font_name; ?>.css" />
	<style type="text/css">
		.footer .top-footer {background: <?php echo $color_site; ?>;}
		.header .top-header {background: <?php echo $color_site; ?>;}
	</style>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<?php wp_head();?>
</head>
<body dir="rtl">

	<header>
		<div class="header text-right">
			<div class="top-header">
				<div class="container m-auto">
					<div class="row">
						<div class="top-header-right col-md-6 float-right text-light">
							<h1 class="d-inline-block"><a title="<?php echo bloginfo('name'); ?>" href="<?php bloginfo('url');?>" class="text-light" style="text-decoration: none;"><?php echo bloginfo('name'); ?></a></h1> &nbsp; | &nbsp;
							<h2 class="d-inline-block"><?php echo bloginfo('description'); ?></h2>
						</div>
						<div class="top-header-left col-md-6 float-left">
							<nav>
								<div class="contact-navbar nav" dir="ltr">
									<ul class="header-contact navbar text-light">
										<li class="nav-item"><span class="fas fa-1x fa-phone"></span> <a class="text-light nav-link" title="call <?php echo get_option("amirBlog_mobile_input");?>" href="tel:<?php echo get_option("amirBlog_mobile_input");?>"> <?php echo get_option("amirBlog_mobile_input");?></a></li>
										<li class="nav-item"><span class="fas fa-1x fa-envelope"></span> <a dir="ltr" class="text-light nav-link" title="mailto <?php echo get_option("amirBlog_email_input");?>" href="mailto:<?php echo get_option("amirBlog_email_input");?>"><?php echo get_option("amirBlog_email_input");?></a></li>
									</ul>
								</div>
							</nav>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="botoom-header">
				<div class="header-navbar">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<nav>
									<div class="header-navbar-menu nav">
										<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class'=> 'navbar', 'container_class'=> 'nav-item' ) ); ?>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>