<?php get_header(); ?>
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
	<div class="smartzoz-row">
		
			
		<!-- Begin post area -->

		<div class="smartzoz-middlesec">
		<div class="smartzoz-post-content">
		 <div class="post-content">
		<?php 
		if (have_posts()) :
			while (have_posts()) : the_post();
			?>	
				<!-- Post Title -->
				<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>

				<!-- begin date, time & Author -->
				<p><?php the_date('F jS, Y'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>
				<!-- End Date, time & Author -->
				
				<!-- Begin Content -->
				<p><?php the_content(); ?></p>
				<!-- End Content  -->
				
				<!-- Begin Category --> 
				<p><?php 
					$categories = get_the_category();
					$seperator = ", ";
					$output ='';
					if ($categories) {
						foreach ($categories as $category) {
							$output .= '<a href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>'. $seperator;
						}
						echo trim($output, $seperator);
					} ?></p>
				<!-- End category -->
				<!-- ADD Social Share button -->
				<h1>Share on:</h1>
					  <div class="social-share-div">
<div class="alternate-page" style="
    background-color: #305c99;
"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">Facebook</a></div>
<div class="alternate-page" style="
    background-color: #00cdff;
"><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&via=SmartzozSocial" target="_blank">Twitter</a></div>
<div class="alternate-page" style="
    background-color: #dc4a38;
"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank">Google +</a></div>
<div class="alternate-page" style="
    background-color: #2c4762;
"><a href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>" target="_blank">Tumblr</a></div>
<div class="alternate-page" style="
    background-color: #44c054;
"><a href="whatsapp://send?text=<?php the_permalink(); ?>" target="_blank">WhatsApp</a></div>
</div>
				<!-- End Social Share button -->
				<!-- Begin Post Author details -->
				<div>
					<h3>About the Author </h3>
					<div>
						<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
					</div>
					<div>
						<h4><?php echo get_the_author_meta('nickname')	?></h4>
						<?php echo wpautop(get_the_author_meta('description')) ?>
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">View all post by : <?php the_author(); ?></a>
					</div>	
				</div>	
				<!-- End post Author details -->

			<div>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; 
			?>
			</div>
			<?php
			endwhile;
		else : 
			?>
				<h1>No Content found</h1>
				<p>This is the wordpress theme</p>
		<?php 
		endif;
		?>
		</div>
		</div>
		</div>
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