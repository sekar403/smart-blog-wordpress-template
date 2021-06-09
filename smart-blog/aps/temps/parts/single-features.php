<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
?>
<div class="aps-main-features">
	<?php  // get general product data
	$general = get_aps_product_general_data($pid);
	// get product categories
	$cats = get_product_cats($pid);
	$cat_id = $cats[0]->term_id;
	
	// get comps lists
	$comp_lists = aps_get_compare_lists();
	$in_comps = aps_product_in_comps($comp_lists, $pid); ?>
	<div class="aps-product-meta">
		<?php  // make sure general data is added
		if (isset($general['price']) && $general['price'] > 0) {
			$item_on_sale = aps_product_on_sale($general); ?>
			<span class="aps-product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<span class="aps-price-value"><?php echo aps_get_product_price($currency, $general); ?></span>
				
				<meta itemprop="priceCurrency" content="<?php echo $currency['currency']; ?>" />
				<meta itemprop="price" content="<?php echo ($item_on_sale) ? $general['sale-price'] : $general['price'] ; ?>" />
				<?php // if product is on sale
				if ($item_on_sale) {
					$sale_end = aps_get_timestamp($general['sale-end']); ?>
					<meta itemprop="priceValidUntil" content="<?php echo date('Y-m-d', $sale_end); ?>" />
				<?php } ?>
				<link itemprop="availability" href="http://schema.org/<?php echo $general['stock']; ?>" />
			</span>
			<br />
			<?php if ($item_on_sale) {
				// calculate and print the discount
				$calc_discount = aps_calc_discount($general['price'], $general['sale-price']); ?>
				<span class="aps-product-discount">
					<span class="aps-product-term"> <?php _e('You Save', 'aps-text'); ?>: </span> <?php echo aps_format_product_price($currency, $calc_discount['discount']); ?> (<?php echo $calc_discount['percent']; ?>%)
				</span><br />
			<?php }
		}
		// print SKU of item
		if (!empty($general['sku'])) { ?>
			<span class="aps-product-sku"><span class="aps-product-term"> <?php _e('SKU', 'aps-text'); ?>: </span> <span itemprop="sku"><?php echo $general['sku']; ?></span></span><br />
		<?php } ?>
		
		<span class="aps-product-brand"><span class="aps-product-term"> <?php _e('Brand', 'aps-text'); ?>: </span> <a href="<?php echo get_term_link($brand); ?>"><span  itemprop="brand"><?php echo $brand->name; ?></span></a></span><br />
		<span class="aps-product-cat"><span class="aps-product-term"> <?php _e('Category', 'aps-text'); ?>: </span> <a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a></span><br />
		<label class="aps-compare-btn" data-title="<?php echo $title; ?>">
			<input type="checkbox" class="aps-compare-cb" name="compare-id" data-ctd="<?php echo $cat_id; ?>" value="<?php echo $pid; ?>"<?php if ($in_comps) echo ' checked="checked"'; ?> />
			<span class="aps-compare-stat"><i class="aps-icon-check"></i></span>
			<span class="aps-compare-txt"><?php echo ($in_comps) ? esc_html__('Remove from Compare', 'aps-text') : esc_html__('Add to Compare', 'aps-text'); ?></span>
		</label>
	</div>
	<div class="clear"></div>
	
	<?php // Main Features of product
	if ($design['features'] != 'disable') {
	
		// get main features attributes
		$features = get_aps_product_features($pid);
		
		if (aps_is_array($features)) { ?>
			<ul class="<?php echo ($design['features'] == 'list') ? 'aps-features-list' : 'aps-features aps-row-mini clearfix'; ?>">
				<?php foreach ($features as $feature) {
					$feature_name = isset($feature['name']) ? $feature['name'] : '';
					$feature_icon = isset($feature['icon']) ? $feature['icon'] : '';
					$feature_val = isset($feature['value']) ? $feature['value'] : ''; ?>
					<li>
						<?php if ($design['features'] == 'list') { ?>
							<div class="aps-feature-anim">
								<span class="aps-list-icon aps-icon-<?php echo $feature_icon; ?>"></span>
								<div class="aps-feature-info">
									<strong><?php echo $feature_name; ?></strong>: <span><?php echo $feature_val; ?></span>
								</div>
							</div>
						<?php } elseif ($design['features'] == 'metro') { ?>
							<div class="aps-flipper">
								<div class="flip-front">
									<span class="aps-flip-icon aps-icon-<?php echo $feature_icon; ?>"></span>
								</div>
								<div class="flip-back">
									<span class="aps-back-icon aps-icon-<?php echo $feature_icon; ?>"></span><br />
									<strong><?php echo $feature_name; ?></strong><br />
									<span><?php echo $feature_val; ?></span>
								</div>
							</div>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		<?php }
	} ?>
</div>