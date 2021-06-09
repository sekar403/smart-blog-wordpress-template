<?php if (!defined('APS_VER')) exit('restricted access');
/*
 * @package WordPress
 * @subpackage APS Products
*/
?>
<div class="aps-product-videos aps-row"<?php echo aps_data_attrs($lightbox); ?>>
	<?php foreach ($videos as $video) {
		$host = $video['host'];
		$vid = $video['vid'];
		
		switch ($host) {
			case 'youtube': $video_url = 'https://www.youtube.com/watch?v=' .$vid; break;
			case 'vimeo': $video_url = 'https://www.vimeo.com/' .$vid; break;
			case 'dailymotion': $video_url = 'https://www.dailymotion.com/embed/video/' .$vid; break;
		} ?>
		<div class="aps-video-col">
			<div class="aps-video-box">
				<div class="aps-video">
					<a class="aps-lightbox" href="<?php echo $video_url; ?>"<?php if ($host == 'dailymotion') echo ' data-lightbox-type="iframe"'; ?> data-lightbox-gallery="video">
						<img src="<?php echo str_replace( 'http://', 'https://', $video['img'] ); ?>" alt="Video Thumbnail" />
						<span class="aps-video-play aps-icon-play" title="<?php esc_html_e('Click to play video', 'aps-text'); ?>"></span>
					</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>