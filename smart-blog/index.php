<?php get_header(); ?>
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
   <div class="smartzoz-row">
   <div class="smartzoz-middlesec">
         <h1> <?php if ( is_category() ){
            single_cat_title();
            }
            elseif ( is_tag() ) {
            single_tag_title();
            }
            elseif (is_author() ) {
            the_post();
            echo 'Author Archives:'.get_the_author();
            rewind_posts();
            }
            elseif (is_day() ) {
            echo 'Date Archive:'. get_the_date();
            }
            elseif (is_month() ) {
            echo 'Month Archive:'. get_the_date('F Y');
            }
            elseif (is_year() ) {
            echo 'Year Archive:'. get_the_date('Y');
            }
            elseif ( is_search() ) {
            ?>
            Search: <?php the_search_query();
               }
               ?>
         </h1>
         <?php 
            if (have_posts()) :
            	while (have_posts()) : the_post();
            
            		get_template_part('content');
            	endwhile;
            // ---------------------- Begin Pagination
            	?>
         <div class="smartzoz-pagination">
            <?php
               echo paginate_links();	
               ?>
         </div>
         <?php
            //----------------------- End Pagination			
            			
            		else : 
            			?>
         <h1>No Content found</h1>
         <p>This is a theme by </p>
         <?php 
            endif;
            ?>
						<div class="footer-ads">
				<?php dynamic_sidebar('sidebar-8'); ?>
			 </div>
      </div>
      
      <!-- Begin post area -->
      
      <!-- End post area for all post  -->
      <div class="smartzoz-rightsec">
         <?php get_sidebar( 'right' ); ?>
      </div>
	  <div class="smartzoz-leftsec">
         <?php get_sidebar( 'left' ); ?>
      </div>
   </div>
</div>





<?php get_footer(); ?>