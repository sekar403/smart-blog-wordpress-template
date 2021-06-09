<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/

	// get list of products to compare
	$compList = aps_get_compare_list();
	$pid_count = count($compList);
	
	get_header();

	// get aps design settings
	$design = get_aps_settings('design');
	$post_type = get_post_type();
	$template = 'compare-page'; ?>
	
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
	<div class="smartzoz-row">
		
			
		<!-- Begin post area -->

		<div class="smartzoz-middlesec">
		<div class="smartzoz-post-content">
		 <div class="post-content">
				<?php if ($design['breadcrumbs'] == '1') {
					// print the breadcurmbs
					aps_breadcrumbs();
				}
				
				if ($post_type == 'page') { ?>
					<div class="aps-comp-column">
						<div class="aps-row clearfix">
							<div class="aps-comp-search">
								<strong><?php _e('Search and Add Products to Compare', 'aps-text'); ?></strong>
							</div>
							
							<div class="aps-comp-search">
								<div class="aps-comp-field">
									<input type="text" name="sp" class="aps-search-comp" value="" />
									<span class="aps-icon-search aps-pd-search"></span>
								</div>
							</div>
						</div>
					</div>
					<?php // call after search hook
					do_action('aps_compare_after_search');
				}
				
				// strat loop
				if (!empty($compList) && $pid_count > 0) {
					if ($pid_count == 1) { $span = 'aps-1co'; }
					elseif ($pid_count == 2) { $span = 'aps-2co'; }
					elseif ($pid_count == 3) { $span = 'aps-3co'; }
					elseif ($pid_count >= 4) { $span = 'aps-4co'; }
					
					// get product categories
					$cats = get_product_cats($compList[0]);
					$cat_id = $cats[0]->term_id;
					
					// get attributes groups by category
					$groups = get_aps_cat_groups($cat_id);
					
					// get groups and attributes data
					$groups_data = get_aps_groups_data();
					$attrs_data = get_aps_attributes_data();
					$show_thumbs = (isset($design['comp-thumbs'])) ? $design['comp-thumbs'] : '1';
					
					// main labels
					$labels = array(
						'product' => __('Product Name', 'aps-text'),
						'image' => __('Product Image', 'aps-text'),
						'price' => __('Overview', 'aps-text'),
						'rating' => __('Our Rating', 'aps-text'),
						'brand' => __('Brand', 'aps-text'),
						'cat' => __('Category', 'aps-text')
					);
					
					// get store curenncy
					$currency = aps_get_base_currency();
					$product = get_post($pid); // Sekar SZ
					$the_content = apply_filters('the_content', $products->post_content);
			
					// get image size
					$images_settings = get_aps_settings('store-images');
					$image_width = $images_settings['catalog-image']['width'];
					$image_height = $images_settings['catalog-image']['height'];
					$image_crop = $images_settings['catalog-image']['crop'];
					
					// product thumbnail
					$thumb_width = $images_settings['product-thumb']['width'];
					$thumb_height = $images_settings['product-thumb']['height'];
					$thumb_crop = $images_settings['product-thumb']['crop'];
					
					$data = array();
					$thumbnails = '';
					foreach ($compList as $pid) {
						// get post meta data by key
						$rating = get_product_rating_total($pid);
						$image = get_product_image($image_width, $image_height, $image_crop, $pid);
						
						$p_title = get_the_title($pid);
						$p_link = get_permalink($pid);
						$cats = get_product_cats($pid);
						$cat_id = $cats[0]->term_id;
						
						// get product thumbnails
						if ($show_thumbs == '1') {
							$thumb_image = get_product_image($thumb_width, $thumb_height, $thumb_crop, $pid);
							$thumbnails .= '<span class="' .$span .' aps-attr-header"><img src="' .$thumb_image['url'] .'" alt="' .$p_title .'" /></span>';
						}
						
						$remove = (!is_single()) ? '<span class="aps-close-icon aps-icon-cancel aps-remove-compare" data-pid="' .$pid .'" data-ctd="' .$cat_id .'" title="' .__('Remove Compare', 'aps-text') .'" data-load="true"></span>' : null;
						
						$main_title[] = $p_title;
						$brand = ($product_brand = get_product_brand($pid)) ? $product_brand : null;
						$brand_link = (isset($brand)) ? get_term_link($brand) : '';
						$categories = get_product_cats($pid);
						$category = (isset($categories[0])) ? $categories[0]->name : null;
						$cat_link = (isset($categories[0])) ? get_term_link($categories[0]) : '';
						
						// get general product data
						$general = get_aps_product_general_data($pid);
						
						$data['product'][$pid] = '<h4 class="aps-comp-title"><a href="' .$p_link .'" title="' .$p_title .'">' .$p_title .'</a></h4>';
						$data['image'][$pid] = '<a href="' .$p_link .'" title="' .$p_title .'"><img class="aps-comp-thumb" src="' .$image['url'] .'" alt="' .$p_title .'" /></a>' .$remove;
						$data['price'][$pid] = '<span class="aps-cr-price aps-price-value"><div class="aps-column" itemprop="description">'.$the_content.'</div></span>';
						$data['rating'][$pid] = (has_action('aps_compare_product_rating')) ? do_action('aps_compare_product_rating', $pid) : '<span class="aps-comp-rating">' .$rating .'</span>';
						$data['brand'][$pid] = '<a href="' .$brand_link .'">' .(isset($brand) ? $brand->name : '') .'</a>';
						$data['cat'][$pid] = '<a href="' .$cat_link .'">' .(isset($category) ? $category : '') .'</a>';
					}
					
					// call before title hook
					do_action('aps_compare_before_title'); ?>
					
					<h1 class="aps-main-title"><?php echo implode(' ' .__('vs', 'aps-text') .' ', $main_title); ?></h1>
					<?php // call after title hook
					do_action('aps_compare_after_title');
					
					if ($post_type == 'aps-comparisons') {
						global $post;
 } ?>
					
					<div class="aps-group">
						<div class="aps-specs-table">
							<div class="aps-specs-scroller">
								<ul class="aps-specs-list">
									<?php // print basic values
									foreach ($labels as $l_key => $label) { ?>
										<li>
											<div class="aps-attr-title">
												<strong class="aps-term"><?php echo $label; ?></strong>
											</div>
											
											<div class="aps-attr-value">
												<?php foreach ($data[$l_key] as $vl) { ?>
													<div class="<?php echo $span; ?>"><?php echo $vl; ?></div>
												<?php } ?>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					
					<?php  // groups loop
					if (aps_is_array($groups)) {
						foreach ($groups as $group) {
							$group_data = $groups_data[$group];
							
							$specs = array();
							foreach ($compList as $pid) {
								// get post meta data by key
								$attr_group = get_aps_product_attributes($pid, $group);
								$group_attrs = get_aps_group_attributes($group);
								
								if ($group_attrs) {
									foreach ($group_attrs as $attr_id) {
										
										$attr_data = $attrs_data[$attr_id];
										$attr_meta = $attr_data['meta'];
										$attr_info = $attr_data['desc'];
										$specs[$group][$attr_id]['name'] = $attr_data['name'];
										$specs[$group][$attr_id]['info'] = $attr_info;
										$specs[$group][$attr_id]['values'][] = $attr_group[$attr_id];
										$specs[$group][$attr_id]['type'] = $attr_meta['type'];
									}
								}
							}
							
							// check if specs is not empty
							if ($specs) { ?>
								<div class="aps-group">
									<h3 class="aps-group-title"><?php echo $group_data['name']; ?> <?php if ($design['icons']  == '1') { ?><span class="alignright aps-icon-<?php echo $group_data['icon']; ?>"></span><?php } ?></h3>
									<div class="aps-specs-table">
										<div class="aps-specs-scroller">
											<ul class="aps-specs-list">
												<?php if ($show_thumbs == '1') { ?>
													<li>
														<div class="aps-attr-title"></div>
														<div class="aps-attr-value"><?php echo $thumbnails; ?></div>
													</li>
													<?php
												} // print products specs
												foreach ($specs as $group_key => $attr_group) {
													foreach ($attr_group as $attr) {
														$values = $attr['values'];
														if (aps_array_has_values($values)) { ?>
															<li>
																<div class="aps-attr-title">
																	<strong class="aps-term<?php if ($attr['info']) echo ' aps-tooltip'; ?>"><?php echo $attr['name']; ?></strong> 
																	<?php if ($attr['info']) echo '<span class="aps-tooltip-data">' .str_replace(array('<p>', '</p>'), '', $attr['info']) .'</span>'; ?>
																</div>
																<div class="aps-attr-value">
																	<?php // print specs
																	foreach ($values as $value) {
																		if ($attr['type'] == 'date') {
																			$value = (!empty($value)) ? date_i18n($currency['date-format'], strtotime($value)) : '';
																		} elseif ($attr['type'] == 'mselect') {
																			$value = implode(', ', $value);
																		} elseif ($attr['type'] == 'check') {
																			$value = ($value == 'Yes') ? '<i class="aps-icon-check"></i>' : '<i class="aps-icon-cancel aps-icon-cross"></i>';
																		} ?>
																		<span class="<?php echo $span; ?>"><?php echo nl2br(htmlspecialchars_decode($value)); ?></span>
																	<?php } ?>
																</div>
															</li>
															<?php
														}
													}
												} ?>
											</ul>
										</div>
									</div>
								</div>
								<?php // call after group hook
								do_action('after_aps_specs_group', $group);
							}
						} // end forach loop
					}
				}
				// call after comparison hook
				do_action('aps_compare_after_comparison'); ?>

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
		
		<script type="text/javascript">
		(function($) {
			<?php if ($post_type == 'page') { ?>
				compare_page = true;
				var cinput = $(".aps-search-comp"),
				cparent = cinput.parent(),
				cul = (!!cparent.find(".aps-comp-results").length ? $(".aps-comp-results") : $("<ul class='aps-comp-results aps-wd-products'></ul>"));
				cinput.on("input propertychange", function(e) {
					var query = cinput.val();
					if (query.length > 1) {
						$.getJSON(
							aps_vars.ajaxurl + "?action=aps-search&num=12&type=compare&org=list&search=" + query,
							function(data) {
								if (data) {
									cul.empty();
									$.each(data, function(k, v) {
										cul.append(v)
									});
									cul.remove();
									cparent.append(cul);
								}
							}
						);
					} else {
						cul.empty();
					}
				}).blur(function() {
					setTimeout(function() {
						cul.hide()
					}, 500);
				}).focus(function() {
					cul.show();
				});
			<?php } ?>
			
			$(window).on("load resize", function(e) {
				/* add table scrolling effect */
				var pid_count = <?php echo $pid_count; ?>;
				
				if ($(".aps-content").width() < 600 && pid_count >= 2 || pid_count >= 4) {
					$(".aps-specs-scroller").css("overflow-x", "scroll");
					$(".aps-specs-list").css("width", "<?php echo ($pid_count * 180); ?>px");
				} else {
					$(".aps-specs-scroller").css("overflow-x", "visible");
					$(".aps-specs-list").css("width", "100%");
				}
				
				/* set attribute title height */
				$(".aps-attr-title").each(function() {
					var attr_title = $(this),
					attr_text = attr_title.find("strong"),
					parent_li = attr_title.parent("li"),
					attr_value = parent_li.find(".aps-attr-value"),
					value_span = attr_value.find("span");
					
					if (attr_text.height() < attr_value.height()) {
						attr_title.css("height", attr_value.height());
						parent_li.css("height", attr_value.height());
					} else if (attr_text.height() > attr_value.height()) {
						attr_title.css("height", attr_text.outerHeight());
						parent_li.css("height", attr_title.outerHeight());
					}
				});
			});
		})(jQuery);
		</script>
	</div>
<?php get_footer(); ?>