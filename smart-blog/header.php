<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <?php if ( is_front_page() || is_home() ) { ?>
   <title><?php bloginfo('name'); ?></title>
   <?php }
      else { ?>
   <title><?php the_title(); ?></title>
    



   <?php } ?>
   <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
	   <link rel="dns-prefetch" href="https://www.googletagmanager.com/" >
    <link rel="preload" href="/wp-content/plugins/aps-products/css/font/aps-icons.woff2?252" as="font" crossorigin type="font/woff2">
      <?php wp_head(); ?>
	   

      <style>
         @font-face {
         font-family: 'Asap';
         src: url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/fonts/Asap-Regular.woff2') format('woff2'),
         url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/fonts/Asap-Regular.woff') format('woff'),
         url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/fonts/Asap-Regular.ttf') format('truetype');
         font-weight: normal;
         font-style: normal;
         font-display: swap;
         }
         @font-face {
         font-family: 'Proxima Nova';
         src: url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/fonts/Proxima-Nova-Regular.woff2') format('woff2'),
         url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/fonts/Proxima-Nova-Regular.woff') format('woff');
         font-weight: normal;
         font-style: normal;
         font-display: swap;
         }
		 img[src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="],img[data-src]:after{
			background-image: url('<?php echo home_url(); ?>/wp-content/themes/smart-blog/img/loading-2.gif');
		 }
      </style>
	  <!--<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">-->
   </head>
   <body <?php body_class(); ?>>
		<div class="top_header_1">
			<div class="container <?php echo get_theme_mod('page_layout_select'); ?> smartzoz-row">
			<div class="country-div">
			<a href="https://smartzoz.in/"><img src="<?php echo home_url(); ?>/wp-content/themes/smart-blog/img/india-flag.png" title="India"></a>
			<a href="https://www.smartzoz.com/"><img src="<?php echo home_url(); ?>/wp-content/themes/smart-blog/img/usa-flag.png" title="USA"></a>
			</div>
			<div class="social-icon"></div>
			</div>
		</div>
   
      <!-- Site Header -->	 
      <header class="site-header">
         <div class="bg-dark">
            <div class="container <?php echo get_theme_mod('page_layout_select'); ?> smartzoz-nav top-nav">
               <nav class="navbar navbar-dark navbar-expand-sm">
                  <a href="javascript:void(0);" style="font-size:15px;" class="navbar-nav-icon" onclick="myFunction()"><i class="aps-icon-menu"></i></a>
                  <?php 
                     $args = array(
                     	'container'       => 'div',
                     	'container_class' => 'collapse navbar-collapse',
                     	'container_id'    => 'navbar-list-2',
                     	'menu_class' => 'navbar-nav',
                     	'theme_location' => 'headerm'
                     );
                     	wp_nav_menu( $args ); ?>
               </nav>
               <!-- Search bar -->
               <div class="smartzoz-search">
               </div>
               <!-- end search bar -->
            </div>
         </div>
         <!-- End Social Icon -->
         <div class="logo-sec-main">
            <div class="container <?php echo get_theme_mod('page_layout_select'); ?> smartzoz-siteheader smartzoz-row">
               <!-- Site log  -->
               <div class="smartzoz-logo">
                  <a href="<?php echo home_url(); ?>" >
                  <?php 	$custom_logo_id = get_theme_mod( 'custom_logo' );
                     $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                     if ( has_custom_logo() ) {
                     		the_custom_logo();
                     } 
                     else {
                     		echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                     		echo '<h5>'. bloginfo( 'description' ) .'</h5>';
                     }
                     ?>
                  </a>
               </div>
               <!-- End site Logo -->
               <!-- Advert widget -->
               <div>
                  <?php dynamic_sidebar('sidebar-7'); ?>
               </div>
            </div>
         </div>
         
		  
      </header>
	  <!-- Nav Menu -->
         <div class="bg-dark main-nav-header">
            <div class="container <?php echo get_theme_mod('page_layout_select'); ?> smartzoz-nav main-nav">
               <nav class="navbar navbar-dark navbar-expand-sm">
                  <a style="font-size:15px;" class="navbar-nav-icon"><i class="aps-icon-menu"></i></a>
                  <?php 
                     $args = array(
                     	'container'       => 'div',
                     	'container_class' => 'collapse navbar-collapse nav-mob',
                     	'container_id'    => 'navbar-list-2',
                     	'menu_class' => 'navbar-nav',
                     	'theme_location' => 'primary'
                     );
                     	wp_nav_menu( $args ); ?>
               </nav>
               <!-- Search bar -->
               <div class="smartzoz-search">
                  <?php get_search_form(); ?>
               </div>
               <!-- end search bar -->
            </div>
			
         </div>
         <!-- End nav menu -->
		 <div>
                  <?php dynamic_sidebar('sidebar-17'); ?>
         </div>