<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
get_header();

// get aps design settings
$design = get_aps_settings('design');
$template = 'brands-list'; ?>
	
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
	<div class="smartzoz-row">
		
			
		<!-- Begin post area -->

		<div class="smartzoz-middlesec">
		<div class="smartzoz-post-content">
		 <div class="post-content">
				<?php // aps-brands list
				$settings = get_aps_settings('settings');
				$brands = get_all_aps_brands('a-z');
				
				if ($brands) {
					$alphabet = array();
					$brands_ob = array();
					foreach ($brands as $brand) {
						$first_letter = mb_substr($brand->name, 0, 1);
						if (!in_array($first_letter, $alphabet)) {
							$alphabet[] = $first_letter;
						}
						$brands_ob[$first_letter][] = $brand;
					}
				}
				
				if ($design['breadcrumbs'] == '1') {
					// print the breadcurmbs
					aps_breadcrumbs();
				}
				
				// call before title hook
				do_action('aps_brands_list_before_title');?>
				
				<h1 class="aps-main-title"><?php echo $settings['brands-list-title']; ?></h1>
				
				<?php // call after title hook
				do_action('aps_brands_list_after_title'); ?>
				
				<div class="aps-column">
					<?php if ($brands) { ?>
						<ol class="aps-brands-alpha">
							<?php // print alphabet
							foreach ($alphabet as $letter) { ?>
								<li><a href="#brand-<?php echo $letter; ?>"><strong><?php echo $letter; ?></strong></a></li>
							<?php } ?>
						</ol>
					<?php } ?>
				</div>
				
				<?php // call after alphabet hook
				do_action('aps_brands_list_after_alphabet'); ?>
				
				<div class="aps-column">
					<?php if ($brands) {
						foreach ($alphabet as $letter) { ?>
							<div id="brand-<?php echo $letter; ?>" class="aps-brands-box">
								<div class="aps-brands-head">
									<h2><?php echo $letter; ?></h2>
								</div>
								<ul class="aps-brands-body">
									<?php $alpha_brands = $brands_ob[$letter];
									foreach ($alpha_brands as $ab) {
										$attach_id = get_aps_term_meta($ab->term_id, 'brand-logo');
										if ($attach_id) {
											$image = get_product_image(120, 120, true, '', $attach_id);
										} ?>
										<li>
											<a href="<?php echo get_term_link($ab); ?>">
												<?php if ($attach_id) { ?>
													<img src="<?php echo $image['url']; ?>" alt="" />
												<?php } ?>
												<span><?php echo ucfirst($ab->name); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php }
					} ?>
				</div>

			<div><div class="footer-ads">
				<?php dynamic_sidebar('sidebar-8'); ?>
			 </div></div>
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