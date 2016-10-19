<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_directory'); ?>/library/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/<?php bloginfo('template_directory'); ?>/library/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/library/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/library/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#252525">
        
        

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<!-- HAI LAUNCH SEO TEAM! -->
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

		<header class="header" role="banner">

        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    
                
                    <a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>"><span class="sr-only"><?php if (is_front_page()) { echo '<h1 class="sr-only">'. get_bloginfo('name').'</h1>'; } else {echo get_bloginfo('name'); } ?></span><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/launch-logo.png" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                </div>

                <div class="navbar-collapse" id="main-nav">

                    <?php launch_main_nav(); ?>
                   
                    
                </div>

            </div>
        </nav>

    </header>
		
	<div class="container"> <?php // this is closed in the footer ?>