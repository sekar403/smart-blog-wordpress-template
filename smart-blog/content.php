<div class="smartzoz-post-content">
   <div class="post-thumbnail">
      <a href="<?php the_permalink(); ?>">
      <?php
         if ( has_post_thumbnail() ) {
         	the_post_thumbnail('thumbnail');
         }
         ?>
      </a>
   </div>
   <div class="post-content">
      <a href="<?php the_permalink(); ?>">
         <!-- Post Title -->
         <h2><?php the_title(); ?></h2>
      </a>
      <!-- begin date, time & Author -->
      <!--<p class="author_sec"><?php the_date('F jS, Y'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>-->
      <!-- End Date, time & Author -->
      <!-- Begin Post content -->
      <p><?php echo the_excerpt(); ?> <a class="readmore-btn" href="<?php the_permalink(); ?>">Read more&raquo </a></p>
      <!-- End End post content -->
      <!-- Begin Category --> 
      <p><?php 
         $categories = get_the_category();
         $seperator = ", ";
         $output ='';
         if ($categories) {
         	foreach ($categories as $category) {
         		$output .= '<a class="category-links" href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>';
         	}
         	echo trim($output, $seperator);
         } ?></p>
      <!-- End category -->

   </div>
</div>