<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
get_header();

// get aps design settings
$design = get_aps_settings('design');
$template = 'main-catalog'; ?>
	
<div class="container <?php echo get_theme_mod('page_layout_select'); ?>">
	<div class="smartzoz-row">
		
			
		<!-- Begin post area -->

		<div class="smartzoz-middlesec">
		<div class="smartzoz-post-content">
		 <div class="post-content">
				<?php // APS Index Page Template
				global $wp, $wp_query;
				
				if (get_query_var('page')) {
					$paged = get_query_var('page');
				} elseif (get_query_var('paged')) {
					$paged = get_query_var('paged');
				} else {
					$paged = 1; 
				}
				
				$settings = get_aps_settings('settings');
				$index_link = add_query_arg( null, null, home_url( $wp->request ) .'/' );
				$sort = isset($_GET['sort']) ? trim(strip_tags($_GET['sort'])) : null;
				$display = isset($_COOKIE['aps_display']) ? trim(strip_tags($_COOKIE['aps_display'])) : $settings['default-display'];
				$perpage = ($num = $settings['num-products']) ? $num : 12;
				$url_args = array();
				$filters_terms = array();
				
				// query params
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
						$taxonomies = array();
						foreach ($filters as $filter) {
							$tax = explode('.', $filter);
							$terms = explode(',', $tax[1]);
							
							$taxonomies[] = array(
								'taxonomy' => 'fl-' .$tax[0],
								'field' => 'slug',
								'terms' => $terms
							);
							
							$filters_terms[$tax[0]] = $terms;
						}
						
						// add filters in query args
						$args['tax_query'] = array(
							'relation' => 'AND',				
							array(
								'relation' => 'OR',
								$taxonomies
							)
						);
					}
					
					$url_args['filters'] = $get_filters;
				}
				
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
				if (isset( $url_args['filter'] )) {
					$unsort_url = $index_link .'?filters=' .$url_args['filters'];
					$sort_url = $index_link .'?filters=' .$url_args['filters'] .'&amp;sort=';
					$filter_url = $index_link .'?filters=';
					$un_filter_url = $index_link;
				} elseif (isset( $url_args['sort'] )) {
					$unsort_url = $index_link;
					$sort_url = $index_link .'?sort=';
					$filter_url = $index_link .'?sort=' .$url_args['sort'] .'&amp;filters=';
					$un_filter_url = $index_link .'?sort=' .$url_args['sort'];
				} else {
					$unsort_url = $index_link;
					$sort_url = $index_link .'?sort=';
					$filter_url = $index_link .'?filters=';
					$un_filter_url = $index_link;
				}
				
				if ($design['breadcrumbs'] == '1') {
					// print the breadcurmbs
					aps_breadcrumbs();
				}
				
				// call before title hook
				do_action('aps_catalog_before_title'); ?>
				
				<h1 class="aps-main-title"><?php echo $settings['index-title']; ?></h1>
				
				<?php // call after title hook
				do_action('aps_catalog_after_title');
				
				// get compare page link
				$comp_link = get_compare_page_link();
				
				// get aps filters
				$filters = get_aps_filters(); ?>
				
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
							<span class="aps-current-dp"><?php echo $settings['brands-dp']; ?></span>
							<ul>
								<?php foreach ($brands as $brand) { ?>
									<li><a href="<?php echo get_term_link($brand); ?>"><?php echo $brand->name; ?></a></li>
								<?php } ?>
							</ul>
							<span class="aps-select-icon aps-icon-down"></span>
						<?php } ?>
					</div>
					
					<?php if ($filters) { ?>
						<div class="aps-filters-control">
							<a class="aps-filters-sw" href=""><?php echo $settings['filter-title']; ?> <i class="aps-icon-down"></i></a>
						</div>
					<?php } ?>
				</div>
			
				<?php // include filters panel
				if ($filters) {
					$filters_params = array(
						'filters' => $filters,
						'filter_url' => $filter_url,
						'un_filter_url' => $un_filter_url,
						'filters_terms' => $filters_terms
					);
					aps_load_template_part('parts/filters-panel', 'temps', $filters_params);
				}
				
				// call after controls hook
				do_action('aps_catalog_after_controls');
				
				// query args
				$args = apply_filters('aps_catalog_query_args', $args);
				
				// include products query
				$products_params = array(
					'args' => $args,
					'display' => $display,
					'settings' => $settings,
					'paged' => $paged
				);
				aps_load_template_part('parts/loop-products', 'temps', $products_params);
				
				// call after results hook
				do_action('aps_catalog_after_results'); ?>
				
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