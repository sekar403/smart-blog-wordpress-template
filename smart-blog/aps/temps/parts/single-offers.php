<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
// get aps affiliate stores
$stores = get_aps_affiliates(); ?>
<ul class="aps-offers-list clearfix">
	<?php foreach ($offers as $offer) { ?>
		<li>
			<span class="aps-offer-thumb">
				<img src="<?php echo $stores[$offer['store']]['logo']; ?>" alt="<?php echo $stores[$offer['store']]['name']; ?>" />
			</span>
			<span class="aps-offer-title"><?php echo $offer['title']; ?></span>
			<span class="aps-offer-price">
				<?php echo $offer['price']; ?>
			</span>
			<span class="aps-offer-link"><br />
				<a class="aps-button aps-btn-skin" href="<?php echo $offer['url'] .$stores[$offer['store']]['id']; ?>" target="_blank" rel="nofollow"><?php _e('View Offer', 'aps-text'); ?></a>
			</span>
		</li>
	<?php } ?>
</ul>