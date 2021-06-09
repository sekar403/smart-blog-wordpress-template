<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
	
	// get product rating
	$product_rating = get_product_rating($pid);
	$rating_display = (isset($product_rating['show_bars'])) ? $product_rating['show_bars'] : 'yes';
	$animate = (isset($settings['rating-anim'])) ? $settings['rating-anim'] : 'yes';
	
	if ($rating_display === 'yes') { ?>
		<div class="aps-column">
			<?php // product rating
			$total_bar = get_product_rating_total($pid);
			$total_color = aps_rating_bar_color(round($total_bar)); ?>
			<div class="aps-rating-card">
				<div class="aps-rating-text-box">
					<h3 class="no-margin uppercase"><?php echo $settings['rating-title']; ?></h3>
					<p><em><?php echo $settings['rating-text']; ?></em></p>
				</div>
				
				<div class="aps-rating-bar-box">
					<div class="aps-overall-rating" data-bar="<?php echo ($animate === 'yes') ? 'true' : 'false'; ?>" data-rating="<?php echo $total_bar; ?>" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
						<span class="aps-total-wrap">
							<span class="aps-total-bar <?php echo $total_color; ?>" data-type="bar"<?php if ($animate != 'yes') echo ' style="width:' .($total_bar * 10) .'%;"'; ?>></span>
						</span>
						<span class="aps-rating-total" data-type="num"><?php echo $total_bar; ?></span>
						<span class="meta-elems" itemprop="ratingValue"><?php echo number_format(($total_bar / 2), 1); ?></span>
						<?php $reviews_count = get_comments_number();
						$reviews_count = ($reviews_count > 0) ? $reviews_count : 1; ?>
						<span class="meta-elems" itemprop="reviewCount"><?php echo $reviews_count; ?></span>
					</div>
				</div>
				<div class="clear"></div>
				
				<ul class="aps-pub-rating aps-row clearfix">
					<?php // get category rating bars terms
					$rating_bars = get_aps_cat_bars($cat_id);
					$bars_data = get_aps_rating_bars_data();
					
					if (aps_is_array($rating_bars)) {
						foreach ($rating_bars as $bar) {
							$bar_data = $bars_data[$bar];
							$bar_slug = $bar_data['slug'];
							$rating = (!empty($product_rating[$bar_slug])) ? $product_rating[$bar_slug] : $bar_data['val'];
							$color = aps_rating_bar_color($rating); ?>
							<li>
								<div class="aps-rating-box" data-bar="<?php echo ($animate === 'yes') ? 'true' : 'false'; ?>" data-rating="<?php echo $rating; ?>">
									<span class="aps-rating-asp">
										<strong><?php echo $bar_data['name']; ?></strong>
										<span class="aps-rating-num"><span class="aps-rating-fig" data-type="num"><?php echo $rating; ?></span> / 10</span>
									</span>
									<span class="aps-rating-wrap">
										<span class="aps-rating-bar <?php echo $color; ?>" data-type="bar"<?php if ($animate !== 'yes') echo ' style="width:' .($rating * 10) .'%;"'; ?>></span>
									</span>
								</div>
							</li>
						<?php }
					} ?>
				</ul>
			</div>
		</div>
	<?php } ?>