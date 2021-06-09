<footer class="site-footer">
   <!--	<div class="container">
      <div><img src="http://localhost/meidev/wp-content/uploads/2018/10/mei-clutch-boosters-150x150.jpg">
      </div>
      <div>
      <h2><?php //   echo get_theme_mod('my_post_hook'); ?>    </h2>
      <p> <?php //  echo get_theme_mod('my_post_content_hook'); ?>     <p>
      <a href="#">test </a>
      </div>
      
      </div>-->
   <!-- footer widget area -->
   <div>
      <!-- Footer widget 1 - Column one -->
      <div>
         <?php dynamic_sidebar('sidebar-2'); ?>
      </div>
      <!-- Footer widget 2 - Column two -->
      <div>
         <?php dynamic_sidebar('sidebar-3'); ?>
      </div>
      <!-- Footer widget 3 - Column three -->
      <div>
         <?php dynamic_sidebar('sidebar-4'); ?>
      </div>
   </div>
   <!-- End footer Widget area -->
   <div class="bg-dark">
      <div class="container <?php echo get_theme_mod('page_layout_select'); ?> smartzoz-nav footer-nav">
         <nav class="navbar navbar-dark navbar-expand-sm">
            <?php 
               $args = array(
               	'container'       => 'div',
               	'container_class' => 'collapse navbar-collapse',
               	'container_id'    => 'navbar-list-3',
               	'menu_class' => 'navbar-nav',
               	'theme_location' => 'sitemap'
               );
               	wp_nav_menu( $args ); ?>
         </nav>
      </div>
   </div>
   <!-- Copyrights & Developer -->
   <div class="copyrights">
      <div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
         <a href="<?php echo home_url(); ?>" >
         <?php bloginfo('name') ?> - &copy; <?php echo date('y'); ?>
         </a><a href="smartzoz.com">  -  Theme by SmartZOZ</a>
      </div>
   </div>
</footer>
<div class="overlay-menu">
    
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<link rel="preload" src="https://smartzoz.com/wp-content/themes/profitmag/js/jquery.min.js" as="script">
<!-- End Copyrights & Developer -->
<?php wp_footer(); ?>
<!-- <script src="https://smartzoz.com/wp-content/themes/smart-blog/js/jquery.lazy.min.js"></script> -->
<script>
jQuery(document).ready(function(){jQuery(".search-toggle").click(function(){jQuery(".search-form").slideToggle()}),jQuery(".navbar-nav-icon").click(function(){jQuery(".nav-mob").addClass("open"),jQuery(".search-form").hide(),jQuery(".overlay-menu").show()}),jQuery(".overlay-menu").click(function(){jQuery(".nav-mob").removeClass("open"),jQuery(this).hide()})}); </script> 
<!-- $(function(){$(".lazy").lazy({effect:"fadeIn",effectTime:200,combined:!0})}); -->
	
	<!-- <script src="https://smartzoz.com/wp-content/themes/profitmag/js/jquery.lazy.plugins.min.js"></script> -->

    	 <!-- Google analytics - Country looped -->
	 					<?php
						$blog_id = get_current_blog_id();
						   if ( 1 == $blog_id ) {
						   ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113510018-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113510018-1');
</script>

						   <?php   }
						   elseif ( 9 == $blog_id ) {  ?>
					
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113510018-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113510018-3');
</script>				
					<?php	   }	   ?>
	 
	 	 <!-- End Google analytics - Country looped -->

</body>
</html>