<?php /* Template Name: front page */ ?>
<?php get_header(); ?>
<div>
	   <!-- Begin Homepage Full Width Section - 2 -->
	   <div class="gallery-section">
	   <div class="container">
			<?php dynamic_sidebar('sidebar-13'); ?>
	   </div>
	   </div>
</div>

<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
      <!-- Begin post area -->
	<!-- Begin Section - 1 -->
	   <div>
	   <div class="smartzoz-row home-section1">
		  <div class="smartzoz-middlesec">
		  <div >
			 <div class="post-content">
			 <?php dynamic_sidebar('sidebar-6'); ?>
			 </div>
			 </div>
		  </div>
		  <div class="smartzoz-rightsec">
			<div class="widget-flex">
			<?php dynamic_sidebar('sidebar-14'); ?>
			</div>
		  </div>
	   </div>
	   </div>
	   <!-- Begin Homepage Full Width Section - 1 -->
	   <div>
	   <div class="smartzoz-row home-section-2 gallery-section">
	    <div class="smartzoz-middlesec">
			<?php dynamic_sidebar('sidebar-9'); ?>
	   </div>
	   </div>
	   </div>
	   
	<!-- Begin Section - 2 -->	   
	   <div>
	   <div class="smartzoz-row home-section-3">
		  <div class="smartzoz-middlesec">
		  <div >
			 <div class="post-content">
			 <?php dynamic_sidebar('sidebar-10'); ?>
			 </div>
			 </div>
		  </div>
		  <div class="smartzoz-rightsec">
			<div class="widget-flex">
			<?php dynamic_sidebar('sidebar-15'); ?>
			</div>
		  </div>
	   </div>
	   </div>
	   <!-- Begin Homepage Full Width Section - 2 -->
	   <div>
	   <div class="smartzoz-row home-section-4">
	    <div class="smartzoz-middlesec">
	    <div class="smartzoz-row"> 
			<?php dynamic_sidebar('sidebar-11'); ?>
	   </div>
	   </div>
	   </div>
	   </div>
   
	<!-- Begin Section - 2 -->	   
	   <div>
	   <div class="smartzoz-row home-section-5">
		  <div class="smartzoz-middlesec">
		  <div >
			 <div class="post-content">
			 <?php dynamic_sidebar('sidebar-12'); ?>
			 </div>
			 </div>
		  </div>
		  <div class="smartzoz-rightsec">
			<div>
			<?php dynamic_sidebar('sidebar-16'); ?>
			</div>
		  </div>
	   </div>
	   </div>
	   <!-- Footer Ads -->
			<div class="footer-ads">
				<?php dynamic_sidebar('sidebar-8'); ?>
			 </div>
	 
</div>
<?php get_footer(); ?>