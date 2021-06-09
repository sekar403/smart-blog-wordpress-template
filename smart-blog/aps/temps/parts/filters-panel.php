<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
	$filters_incs = (isset($tax_filters)) ? $tax_filters : false;
	$display_btns = false; ?>
	<div class="aps-filters aps-column<?php if ($filters_terms) echo ' active-filters'; ?>">
		<span class="aps-filters-arrow"></span>
		<ul class="aps-filters-list">
			<?php foreach ($filters as $filter) {
				$include = (aps_is_array($filters_incs)) ? in_array($filter->term_id, $filters_incs) : true;
				if ($include) {
					// get filter tax
					$filter_cbs = $filter->slug;
					
					// get filter terms
					$filter_terms = get_aps_filter_terms($filter_cbs);
					$filter_tax = (isset($filters_terms[$filter_cbs])) ? $filters_terms[$filter_cbs] : array();
					
					// print all terms fields
					if ($filter_terms) {
						$display_btns = true; ?>
						<li>
							<h5><?php echo $filter->name; ?></h5>
							<?php foreach ($filter_terms as $term) {
								$checked = false;
								if ($filter_tax && in_array($term->slug, $filter_tax)) {
									$checked = true;
								} ?>
								<label class="aps-cb-label">
									<input type="checkbox" class="aps-filter-cb" name="<?php echo $filter_cbs; ?>" value="<?php echo $term->slug; ?>"<?php if ($checked) echo ' checked="checked"'; ?> />
									<span class="aps-cb-holder<?php if ($checked) echo ' aps-cb-active'; ?>"><i class="aps-icon-check"></i></span> <?php echo $term->name; ?>
								</label> 
							<?php } ?>
						</li>
					<?php }
				}
			} ?>
		</ul>
		<?php if ($display_btns) { ?>
			<button class="aps-button aps-btn-black aps-filter-reset" data-reset="<?php echo $un_filter_url; ?>"><i class="aps-icon-cancel"></i> <?php _e('Clear all', 'aps-text'); ?></button>
			<button class="aps-button aps-btn-skin aps-filter-submit alignright" data-url="<?php echo $filter_url; ?>" data-reset="<?php echo $un_filter_url; ?>"><i class="aps-icon-search"></i> <?php _e('Search', 'aps-text'); ?></button>
		<?php } ?>
	</div>
	<script type="text/javascript">
	(function($) {
		$(".aps-filters-sw").click(function(e) {
			$(".aps-filters").slideToggle();
			e.preventDefault();
		});
		
		if ($(".aps-filters").hasClass("active-filters")) {
			$(".aps-filters").slideDown();
		}
		
		$(".aps-filter-submit").click(function() {
			var url = $(this).data("url"),
			reset = $(this).data("reset"),
			filters = [],
			filters_query = [];
			$(".aps-filter-cb:checked").each(function(e) {
				var filter_name = $(this).attr("name"),
				filter_values = [];
				
				$("[name='" +filter_name+ "']:checked").each(function() {
					filter_values.push(this.value);
				});
				
				if ($.inArray(filter_name, filters) < 0) {
					filters.push(filter_name);
					filters_query.push(filter_name + "." + filter_values.join(","));
				}
			});
			
			if (filters.length !== 0) {
				filters_query = filters_query.join("_");
				location = url + filters_query;
			} else {
				location = reset;
			}
		});
		
		$(".aps-filter-reset").click(function() {
			var reset = $(this).data("reset");
			location = reset;
		});
	})(jQuery);
	</script>
	