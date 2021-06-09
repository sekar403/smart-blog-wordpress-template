<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
$attrs_data = get_aps_attributes_data();
$groups_data = get_aps_groups_data();

// start foreach loop
foreach ($groups as $group) {
	$group_data = $groups_data[$group];
	$group_attrs = get_aps_group_attributes($group);
	
	// get post meta data by key
	$attributes = get_aps_product_attributes($pid, $group);
	
	// check if data is an array
	if (aps_is_array($group_attrs)) { ?>
		<div class="aps-group">
			<h3 class="aps-group-title"><?php echo $group_data['name']; ?> <?php if ($design['icons']  === '1') { ?><span class="alignright aps-icon-<?php echo $group_data['icon']; ?>"></span><?php } ?></h3>
			<div class="aps-specs-table">
				<div class="aps-specs-scroller">
					<ul class="aps-specs-list">
						<?php foreach ($group_attrs as $attr_id) {
							// get attribute data
							$attr_data = $attrs_data[$attr_id];
							$attr_meta = $attr_data['meta'];
							$attr_info = $attr_data['desc'];
							$value = (isset($attributes[$attr_id])) ? $attributes[$attr_id] : null;
							
							if ($value) {
								// check if value is date
								if ($attr_meta['type'] === 'date') {
									$value = date_i18n($currency['date-format'], strtotime($value));
								} elseif ($attr_meta['type'] === 'mselect') {
									$value = implode(', ', $value);
								} elseif ($attr_meta['type'] === 'check') {
									$value = ($value === 'Yes') ? '<i class="aps-icon-check"></i>' : '<i class="aps-icon-cancel aps-icon-cross"></i>';
								} ?>
								<li>
									<div class="aps-attr-title">
										<strong class="aps-term<?php if (!empty($attr_info)) echo ' aps-tooltip'; ?>"><?php echo $attr_data['name']; ?></strong> 
										<?php if (!empty($attr_info)) echo '<span class="aps-tooltip-data">' .str_replace(array('<p>', '</p>'), '', $attr_info) .'</span>'; ?>
									</div>
									
									<div class="aps-attr-value">
										<span class="aps-1co"><?php echo nl2br(htmlspecialchars_decode($value)); ?></span>
									</div>
								</li>
							<?php }
						} ?>
					</ul>
				</div>
			</div>
		</div>
		<?php // call after group hook
		do_action('after_aps_specs_group', $group);
	}
}
