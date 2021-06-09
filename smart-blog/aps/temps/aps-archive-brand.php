<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
get_header();

// get aps design settings
$design = get_aps_settings('design');
$template = 'archive-brand'; ?>
	
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
	<div class="smartzoz-row">
		
			
		<!-- Begin post area -->

		<div class="smartzoz-middlesec">
		<div class="smartzoz-post-content">
		 <div class="post-content">
				<?php // aps-brands archive
				global $wp_query;
				
				$settings = get_aps_settings('settings');
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$brand = get_query_var('aps-brands');
				$brand_term = get_term_by('slug', $brand, 'aps-brands');
				$term_link = get_term_link($brand_term);
				$archive_link = add_query_arg( null, null, home_url( $wp->request ) .'/' );
				$sort = isset($_GET['sort']) ? trim(strip_tags($_GET['sort'])) : null;
				$display = isset($_COOKIE['aps_display']) ? trim(strip_tags($_COOKIE['aps_display'])) : $settings['default-display'];
				$perpage = ($num = $settings['num-products']) ? $num : 12;
				$brand_id = $brand_term->term_id;
				$url_args = array();
				$filters_terms = array();
				$taxonomies = array(
					array(
						'taxonomy' => 'aps-brands',
						'field' => 'slug',
						'terms' => array($brand)
					)
				);
				
				// query paraps
				$args = array(
					'post_type' => 'aps-products',
					'posts_per_page' => $perpage,
					'paged' => $paged
				);
				
				// get filters query params
				if (isset($_GET['filters'])) {
					$get_filters = trim($_GET['filters']);
					$filters = explode('_', $get_filters);
					
					if ($filters) {
						foreach ($filters as $filter) {
							$tax = explode('.', $filter);
							$terms = explode(',', $tax[1]);
							
							$taxonomies[] = array(
								'taxonomy' => 'fl-' .$tax[0],
								'field' => 'slug',
								'terms' => $terms,
							);
							
							$filters_terms[$tax[0]] = $terms;
						}
					}
					
					$url_args['filters'] = $get_filters;
				}
				
				// add filters in query args
				$args['tax_query'] = array(
					array(
						'relation' => 'OR',
						$taxonomies
					)
				);
				
				// sort posts by user input
				if ($sort) {
					if ($sort == 'name-az') {
						$args['orderby'] = 'title';
						$args['order'] = 'ASC';
					} elseif ($sort == 'name-za') {
						$args['orderby'] = 'title';
						$args['order'] = 'DESC';
					} elseif ($sort == 'rating-hl') {
						$args['orderby'] = 'meta_value_num';
						$args['meta_key'] = 'aps-product-rating-total';
					} elseif ($sort == 'rating-lh') {
						$args['orderby'] = 'meta_value_num';
						$args['order'] = 'ASC';
						$args['meta_key'] = 'aps-product-rating-total';
					} elseif ($sort == 'reviews-hl') {
						$args['orderby'] = 'comment_count';
					} elseif ($sort == 'reviews-lh') {
						$args['orderby'] = 'comment_count';
						$args['order'] = 'ASC';
					}
					
					$url_args['sort'] = $sort;
				}
				
				// product sorting
				$sorts = aps_get_product_sorts();
				
				// create urls using query string params 
				if (isset( $url_args['filters'] )) {
					$unsort_url = $archive_link .'?filters=' .$url_args['filters'];
					$sort_url = $archive_link .'?filters=' .$url_args['filters'] .'&amp;sort=';
					$filter_url = $term_link .'?filters=';
					$un_filter_url = $archive_link;
				} elseif (isset( $url_args['sort'] )) {
					$unsort_url = $archive_link;
					$sort_url = $archive_link .'?sort=';
					$filter_url = $term_link .'?sort=' .$url_args['sort'] .'&amp;filters=';
					$un_filter_url = $archive_link .'?sort=' .$url_args['sort'];
				} else {
					$unsort_url = $archive_link;
					$sort_url = $archive_link .'?sort=';
					$filter_url = $term_link .'?filters=';
					$un_filter_url = $archive_link;
				}
				
				if ($design['breadcrumbs'] == '1') {
					// print the breadcurmbs
					aps_breadcrumbs();
				}
				
				// call before title hook
				do_action('aps_brand_archive_before_title'); ?>
				
				<h1 class="aps-main-title">
					<?php // display logo image
					if ($settings['brands-logo'] == 'yes') {
						$attach_id = get_aps_term_meta($brand_id, 'brand-logo');
						if ($attach_id) {
							$image = get_product_image(100, 100, true, '', $attach_id);
							echo '<img src="' .$image['url'] .'" alt="" />';
						}
					}
					echo '<span>' .str_replace('%brand%', $brand_term->name, $settings['brands-title']) .'</span>'; ?>
				</h1>
				
				<?php // call after title hook
				do_action('aps_brand_archive_after_title');
				
				// get compare page link
				$comp_link = get_compare_page_link(); 
				
				// get aps filters
				$filters = get_aps_filters();
				$brand_filters = get_aps_brand_filters($brand_id);
				$brand_filters = ($brand_filters) ? $brand_filters : array();
				
				// get and display brand description
				$brand_desc = term_description($brand_id, 'aps-brands');
				
				if (!empty($brand_desc)) { ?>
					<div class="aps-brand-desc aps-column aps-brand-main-sec"><?php echo $brand_desc; ?>
					
					
					<div class="aps-column aps-filter-sec">
					<div class="aps-display-controls">
						<span><?php _e('Display', 'aps-text'); ?>:</span>
						<ul>
							<li><a class="aps-display-grid aps-icon-grid<?php if ($display == 'grid') echo ' selected'; ?>" title="<?php _e('Grid View', 'aps-text'); ?>"></a></li>
							<li><a class="aps-display-list aps-icon-list<?php if ($display == 'list') echo ' selected'; ?>" title="<?php _e('List View', 'aps-text'); ?>"></a></li>
						</ul>
					</div>
					
					<div class="aps-sort-controls aps-dropdown">
						<span class="aps-current-dp"><?php echo (isset($sort)) ? $sorts[$sort] : $sorts['default']; ?></span>
						<ul>
							<?php foreach ($sorts as $sk => $sv) {
								if ($sk == 'default' && $sort) { ?>
									<li><a href="<?php echo $unsort_url; ?>"><?php echo $sv; ?></a></li>
								<?php } elseif ($sk != 'default' && $sk != $sort) { ?>
									<li><a href="<?php echo $sort_url .$sk; ?>"><?php echo $sv; ?></a></li>
								<?php }
							} ?>
						</ul>
						<span class="aps-select-icon aps-icon-down"></span>
					</div>
					
					<div class="aps-brands-controls aps-dropdown">
						<?php // get aps brands
						$brands = get_all_aps_brands($settings['brands-sort']);
						
						if ($brands) { ?>
							<span class="aps-current-dp"><?php echo $brand_term->name; ?></span>
							<ul>
								<?php foreach ($brands as $brand) {
									if ($brand_id != $brand->term_id) { ?>
										<li><a href="<?php echo get_term_link($brand); ?>"><?php echo $brand->name; ?></a></li>
									<?php }
								} ?>
							</ul>
							<span class="aps-select-icon aps-icon-down"></span>
						<?php } ?>
					</div>
					
					<?php if (aps_is_array($brand_filters)) { ?>
						<div class="aps-filters-control">
							<a class="aps-filters-sw" href=""><?php echo $settings['filter-title']; ?> <i class="aps-icon-down"></i></a>
						</div>
					<?php } ?>
				</div>
					
					</div>
				<?php } ?>
				
				
				
				<?php // include filters panel
				if (aps_is_array($brand_filters)) {
					$filters_params = array(
						'filters' => $filters,
						'filter_url' => $filter_url,
						'tax_filters' => $brand_filters,
						'un_filter_url' => $un_filter_url,
						'filters_terms' => $filters_terms
					);
					aps_load_template_part('parts/filters-panel', 'temps', $filters_params);
				}
				
				// call after controls hook
				do_action('aps_brand_archive_after_controls');
				
				// query args
				$args = apply_filters('aps_brand_archive_query_args', $args);
				
				// include products query
				$products_params = array(
					'args' => $args,
					'display' => $display,
					'settings' => $settings,
					'paged' => $paged
				);
				aps_load_template_part('parts/loop-products', 'temps', $products_params);
				
				// call after results hook
				do_action('aps_brand_archive_after_results'); ?>

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