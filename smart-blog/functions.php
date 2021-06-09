<?php 

function sz_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
  // wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), true);
}
add_action( 'wp_enqueue_scripts', 'sz_theme_scripts' );



function custom_logo_setup() {
 $defaults = array(
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );


add_action( 'after_setup_theme', 'primary_setup' );
function primary_setup() {
	// Registering Navigation Menu
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'footer' => 'Footer Menu',
		'sitemap' => 'SiteMAP Menu',
		'headerm' => 'Header Menu',
	) );
	
	
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
}

// Remove comment author link
add_filter( 'get_comment_author_link', 'rv_remove_comment_author_link', 10, 3 );
function rv_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );	


// Begin - Set Expert Length
function wp_example_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');


// Add Theme widgets	
function add_theme_widget() {
    register_sidebar( array(
        'name'          => __( 'Right Sidebar'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Left Sidebar'),
        'id'            => 'sidebar-5',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 1'),
        'id'            => 'sidebar-2',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 2'),
        'id'            => 'sidebar-3',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 3'),
        'id'            => 'sidebar-4',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Header Ads'),
        'id'            => 'sidebar-7',
        'before_widget' => '<div class="header_ads %2$s">',
        'after_widget'  => '</div>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Ads'),
        'id'            => 'sidebar-8',
        'before_widget' => '<div class="header_ads %2$s">',
        'after_widget'  => '</div>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Section - 1'),
        'id'            => 'sidebar-6',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Full Width Section - 1'),
        'id'            => 'sidebar-9',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Section - 2'),
        'id'            => 'sidebar-10',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Full Width Section - 2'),
        'id'            => 'sidebar-11',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Section - 3'),
        'id'            => 'sidebar-12',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Homepage Featured Section'),
        'id'            => 'sidebar-13',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Home Sidebar - 1'),
        'id'            => 'sidebar-14',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Home Sidebar - 2'),
        'id'            => 'sidebar-15',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Home Sidebar - 3'),
        'id'            => 'sidebar-16',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
		register_sidebar( array(
        'name'          => __( 'Header Widget 2'),
        'id'            => 'sidebar-17',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Right Sidebar Floating'),
        'id'            => 'sidebar-18',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Left Sidebar Floating'),
        'id'            => 'sidebar-19',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'add_theme_widget' );	


// ------------------------------ Begin - Customization Colour Picker
function my_customize_register($wp_customize){
	$wp_customize->add_setting('my_link_color', array(
		'default' => '#da0000',
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('my_theme_color', array(
		'default' => '#da0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting('my_bg_color', array(
		'default' => '#da0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting('my_c1_color', array(
		'default' => '#da0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting('my_btn_color', array(
		'default' => '#da0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_section('my_standart_colors', array(
		'title' => __('Standard Colors', 'MyThemeName'),
		'priority' => 30,
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_link_color',  array(
        'label'      => __( 'Link Color', 'MyThemeName' ),
        'section'    => 'my_standart_colors',
        'settings'   => 'my_link_color',
    ) ) 
);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_theme_color',  array(
        'label'      => __( 'Theme Colour', 'MyThemeName' ),
        'section'    => 'my_standart_colors',
        'settings'   => 'my_theme_color',
    ) ) 
);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_bg_color',  array(
        'label'      => __( 'Background Colour', 'MyThemeName' ),
        'section'    => 'my_standart_colors',
        'settings'   => 'my_bg_color',
    ) ) 
);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_c1_color',  array(
        'label'      => __( 'Colour 1', 'MyThemeName' ),
        'section'    => 'my_standart_colors',
        'settings'   => 'my_c1_color',
    ) ) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_btn_color',  array(
        'label'      => __( 'Button', 'MyThemeName' ),
        'section'    => 'my_standart_colors',
        'settings'   => 'my_btn_color',
    ) ) 
);
	
}
add_action('customize_register', 'my_customize_register');	
	
// Output Cutomize CSS picked 	

function my_customize_css() { ?>
	<style type="text/css">
		.bg-dark,.search-form,.careercls blockquote,.main-nav .navbar-nav{
			background: <?php echo get_theme_mod('my_theme_color'); ?>;
		}
		.bg-dark a{
			color: <?php echo get_theme_mod('my_link_color'); ?>;
		}
		.smartzoz-row h2,.colour1,h1,h1 a,.post-content h3{
			color: <?php echo get_theme_mod('my_btn_color'); ?>;
		}
		.smartzoz-row h2,.smartzoz-row h1,.smartzoz-row h4.widgettitle,.head_brand_list{
			border-color:<?php echo get_theme_mod('my_btn_color'); ?>;
		}
		.smartzoz-row h2:after,.smartzoz-row h1:after,.menu-item:hover,h4.widgettitle:after{
			background:<?php echo get_theme_mod('my_btn_color'); ?>;			
		}
		a{
			color: <?php echo get_theme_mod('my_bg_color'); ?>;
		}
		.text{
			color: <?php echo get_theme_mod('my_c1_color'); ?>;
		}	
		.readmore-btn,.search-submit,.current-menu-item,.form-submit input{
			background: <?php echo get_theme_mod('my_btn_color'); ?>;
		}	
	</style>
<?php
}
add_action('wp_head', 'my_customize_css');


// -------------------------------- End - Customization Colour Picker


// ------------------------------ Begin - Facebook post 	
function my_social_register($wp_customize){
	$wp_customize->add_setting('my_fb_hook', array(
	));
	// Facebook
	$wp_customize->add_section('my_social_hook_section', array(
		'title' => __('Social Like', 'MyThemeName'),
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_fb_hook_control',  array(
        'label'      => 'Facebook',
        'section'    => 'my_social_hook_section',
        'settings'   => 'my_fb_hook',
    ) ) 
);
	// Twitter
	$wp_customize->add_setting('my_twit_hook', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_twit_hook_control',  array(
        'label'      => 'Twitter',
        'section'    => 'my_social_hook_section',
        'settings'   => 'my_twit_hook',
    ) ) 
);	
	// Youtube
	$wp_customize->add_setting('my_yout_hook', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_yout_hook_control',  array(
        'label'      => 'Youtube',
        'section'    => 'my_social_hook_section',
        'settings'   => 'my_yout_hook',
    ) ) 
);	
	// G+
	$wp_customize->add_setting('my_gplus_hook', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_gplus_hook_control',  array(
        'label'      => 'Google+',
        'section'    => 'my_social_hook_section',
        'settings'   => 'my_gplus_hook',
    ) ) 
);
	// Insta
	$wp_customize->add_setting('my_instag_hook', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_instag_hook_control',  array(
        'label'      => 'Instagram',
        'section'    => 'my_social_hook_section',
        'settings'   => 'my_instag_hook',
    ) ) 
);		


}
add_action('customize_register', 'my_social_register');
// End Facebook post 	

/*
Plugin Name: List Categories Widget
Plugin URI: https://pippinsplugins.com/list-categories-widget-plugin-and-tutorial
Description: Provides a better category list widget, includes support for custom taxonomies
Version: 1.0
Author: Pippin Williamson
Author URI: http://184.173.226.218/~pippin
*/
 
/**
 * List Categories Widget Class
 */
 
 
// -------------------- Begin custom category post widget -------------------------------------------
class category_post_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_widget() {
        parent::WP_Widget(false, $name = 'Category Post Widget');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div >
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => $number,
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="widget-icon-1">
									<?php
									if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 				 
									}
									?>
								</div>
								<div class="widget-icon-title">
								<h5><?php the_title(); ?></h5>
								</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>						
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of post to display'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Category to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_widget
add_action('widgets_init', create_function('', 'return register_widget("category_post_widget");'));
// ----------------------------- End custom category post widget -------------------------------------------


// -------------------- Begin custom category post widget - One-------------------------------------------
	class category_post_widget_one extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_widget_one() {
        parent::WP_Widget(false, $name = 'HomePage Section - 1');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div >
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => $number,
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="smartzoz-post-content">
								   <div class="post-thumbnail">
									  <a href="<?php the_permalink(); ?>">
									  <?php
										 if ( has_post_thumbnail() ) {

                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 	
										 }
										 ?>
									  </a>
								   </div>
								   <div class="post-content">
									  <a href="<?php the_permalink(); ?>">
										 <!-- Post Title -->
										 <h2><?php the_title(); ?></h2>
									  </a>
									  <!-- begin date, time & Author -->
									  <!--<p><?php the_date('F jS, Y'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>-->
									  <!-- End Date, time & Author -->
									  <!-- Begin Post content -->
									  <p><?php echo the_excerpt(); ?> <a class="readmore-btn" href="<?php the_permalink(); ?>">Read more&raquo </a></p>
									  <!-- End End post content -->
									  <!-- Begin Category --> 
									  <p><?php 
										 $categories = get_the_category();
										 $seperator = ", ";
										 $output ='';
										 if ($categories) {
											foreach ($categories as $category) {
												$output .= '<a class="category-links" href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>';
											}
											echo trim($output, $seperator);
										 } ?></p>
									  <!-- End category -->

								   </div>
								</div>							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Post to display'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_widget_one
add_action('widgets_init', create_function('', 'return register_widget("category_post_widget_one");'));
// ----------------------------- End custom category post widget - One -------------------------------------------
// -------------------- Begin Home Page Section - 2-------------------------------------------
	class category_post_widget_two extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_widget_two() {
        parent::WP_Widget(false, $name = 'HomePage Section - 2');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div class="widget-d1">
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => '6',
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="home-img">
									<?php
									if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 		
                                            }
									?>
								</div>
								<div class="home-m-title">
								<h5><?php the_title(); ?></h5>
								</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_widget_two
add_action('widgets_init', create_function('', 'return register_widget("category_post_widget_two");'));
// ----------------------------- End Home Page Section - 2 -------------------------------------------
// -------------------- Begin HomePage  Section - 3-------------------------------------------
	class category_post_widget_four extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_widget_four() {
        parent::WP_Widget(false, $name = 'HomePage Section - 3');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div class="widget-d1">
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => '4',
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="home-img">
									<?php
									if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 		
                                            }
									?>
								</div>
								<div class="home-m-title">
								<h5><?php the_title(); ?></h5>
								</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_widget_four
add_action('widgets_init', create_function('', 'return register_widget("category_post_widget_four");'));
// ----------------------------- End HomePage  Section - 3 -------------------------------------------

// -------------------- Begin HomePage Full-Width Section - 1-------------------------------------------
	class category_post_full_widget_one extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_full_widget_one() {
        parent::WP_Widget(false, $name = 'HomePage Full-Width - 1');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div class="widget-d1">
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => '4',
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="home-img">
									<?php
									if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 		
                                            }
									?>
								</div>
								<div class="home-m-title">
								<h5><?php the_title(); ?></h5>
								</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_full_widget_one
add_action('widgets_init', create_function('', 'return register_widget("category_post_full_widget_one");'));
// ----------------------------- End HomePage Full-Width Section - 1 -------------------------------------------
// -------------------- Begin Homepage full width widget 1/3 -------------------------------------------
	class category_post_full_widget_one_three extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_post_full_widget_one_three() {
        parent::WP_Widget(false, $name = 'HomePage Fullwidth - 1/3');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div >
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => $number,
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="smartzoz-post-content">
								   <div class="post-thumbnail">
									  <a href="<?php the_permalink(); ?>">
									  <?php
										 if ( has_post_thumbnail() ) {
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php 		
                                            }
										 ?>
									  </a>
								   </div>
								   <div class="post-content">
									  <a href="<?php the_permalink(); ?>">
										 <!-- Post Title -->
										 <h2><?php the_title(); ?></h2>
									  </a>
								   </div>
								</div>							<?php endwhile; ?>
							<!-- end of the loop -->						 						 
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Post to display'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_post_full_widget_one_three
add_action('widgets_init', create_function('', 'return register_widget("category_post_full_widget_one_three");'));
// ----------------------------- End Homepage full width widget 1/3 -------------------------------------------
// -------------------- Begin HomePage Featured Section-------------------------------------------
	class category_featured_post_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function category_featured_post_widget() {
        parent::WP_Widget(false, $name = 'HomePage Featured');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$title 		= apply_filters('widget_title', $instance['title']); // the widget title
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display
 
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy
		);
 
		// retrieves an array of categories or taxonomy terms
		$cats = get_categories($args);
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						
						<div class="widget-d1">
						<?php 
						// the query
						$the_query = new WP_Query( array( 'cat' => $taxonomy, 'posts_per_page' => '6',
						'orderby'     => 'modified') ); ?>
						 
						<?php if ( $the_query->have_posts() ) : ?>
						 						 
							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="widget-link">
								<div class="home-img">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('thumbnail');
									}
									?>
								</div>
								<div class="home-m-title">
								<h5><?php the_title(); ?></h5>
								</div>
								</a>
							<?php endwhile; ?>
							<!-- end of the loop -->	
									<!--<div class="widget-link">
                            		<?php// echo get_theme_mod('home_featured_ads'); ?>
                            		</div>-->
							<?php wp_reset_postdata(); ?>						 
						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
						
						</div>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Catagory to display'); ?></label> 
			<?php 
				$dropdown_args = array(
					'id'               => $this->get_field_id( 'taxonomy' ),
					'name'             => $this->get_field_name( 'taxonomy' ), // Added this line
					'show_option_none' => 'Select',
					'hide_empty'       => true,
					'hierarchical'     => true,
					'depth'            => 2,
					'echo'             => 0,
					'selected'         => $instance[ 'taxonomy' ],
					'class'            => 'widefat'
				);

			  echo wp_dropdown_categories( $dropdown_args );
			?>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');

				?>
			</select>		
		</p>
        <?php
    }
} // end class category_featured_post_widget
add_action('widgets_init', create_function('', 'return register_widget("category_featured_post_widget");'));
// ----------------------------- End HomePage Featured Section -------------------------------------------
// ------------------------------- Begin Page Content Display Widget ---------------------------------------------
add_action( 'widgets_init', 'pages_content_widget' );
function pages_content_widget() {
	register_widget( 'pages_content_widget_section' );
}

class pages_content_widget_section extends WP_Widget {

	function __construct(){
		parent::__construct('pages_content_widget_section',__( 'Page Content', 'pages_contents_widget' ),
			array(
				'description' => __( 'Display a complete page', 'pages_contents_widget' ),
				'classname'   => 'pages_content_widget_section'
			)
		);
	}
/*
* Output Type Selection
*/
	function form($instance){
		$currentInstance = $instance;
		$instance = wp_parse_args( (array) $instance, array('pageID' => '','titleEnable' => 'true') );
		if(isset($currentInstance['title']) == false){
			$currentInstance['title'] = "";
		}
		if(isset($currentInstance['pageID']) == false){
			$currentInstance['pageID'] = 1;
		}
		if(isset($currentInstance['titleEnable']) == false){
			$currentInstance['titleEnable'] = 'true';
		}
		if(isset($currentInstance['customCssClass']) == false){
			$currentInstance['customCssClass'] = '';
		}
		if(isset($currentInstance['outputtype']) == false){
			$currentInstance['outputtype'] = "normal";
		}
		if(isset($currentInstance['titletype']) == false){
			$currentInstance['titletype'] = "h2";
		}
		?>
		<p style="font-style: italic;"><small><?php _e( 'Select the page here and then edit the page under the pages tab on the left.', 'pages_contents_widget' ); ?></small></p>
		<p><label for="<?php echo $this->get_field_id('pageID'); ?>"><span style="float:left; width:100%;"><?php _e( 'Page:', 'pages_contents_widget' ); ?></span>
		<select class="large-text" style="width:100%;" id="<?php echo $this->get_field_id('pageID'); ?>" name="<?php echo $this->get_field_name('pageID'); ?>">
			<?php
				$args = array( 'post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1 );
				$pageList = new WP_Query( $args );
				while ( $pageList->have_posts() ){
					$pageList->the_post();
					$pageid = get_the_ID();
				?>
					<option value="<?php echo $pageid; ?>" <?php if($pageid == intval($currentInstance['pageID']) && $currentInstance['pageID'] != null){echo 'selected="selected"';} ?>><?php echo the_title(); ?></option>
				<?php
				}
				wp_reset_postdata();
			?>
		</select>
		</label></p>	
		<p><label for="<?php echo $this->get_field_id('titleEnable'); ?>-yes"><span style="width:100%; float:left;"><?php _e( 'Show Page Title:', 'pages_contents_widget' ); ?></span></label>
		
		<label for="<?php echo $this->get_field_id('titleEnable'); ?>-yes"><?php _e( 'Yes:', 'pages_contents_widget' ); ?> <input type="radio" value="true" name="<?php echo $this->get_field_name('titleEnable'); ?>" id="<?php echo $this->get_field_id('titleEnable'); ?>-yes" <?php if($currentInstance['titleEnable'] == 'true'){echo 'checked="checked"';} ?>/></label>
		<label for="<?php echo $this->get_field_id('titleEnable'); ?>-no"><?php _e( 'No:', 'pages_contents_widget' ); ?> <input type="radio" value="false" name="<?php echo $this->get_field_name('titleEnable'); ?>" id="<?php echo $this->get_field_id('titleEnable'); ?>-no" <?php if($currentInstance['titleEnable'] == 'false'){echo 'checked="checked"';} ?>/></label></p>
		
		<p>	<label for="<?php echo $this->get_field_id('titletype'); ?>"><?php _e( 'Title Type:', 'pages_contents_widget' ); ?></label><br/>
		<select class="large-text" id="<?php echo $this->get_field_id('titletype'); ?>" name="<?php echo $this->get_field_name('titletype'); ?>">
			<option value="h1" <?php if($currentInstance['titletype'] == 'h1'){echo 'selected';}?>>H1</option>
			<option value="h2" <?php if($currentInstance['titletype'] == 'h2'){echo 'selected';}?>>H2</option>
			<option value="h3" <?php if($currentInstance['titletype'] == 'h3'){echo 'selected';}?>>H3</option>
			<option value="h4" <?php if($currentInstance['titletype'] == 'h4'){echo 'selected';}?>>H4</option>
			<option value="h5" <?php if($currentInstance['titletype'] == 'h5'){echo 'selected';}?>>H5</option>
			<option value="h6" <?php if($currentInstance['titletype'] == 'h6'){echo 'selected';}?>>H6</option>
			<option value="p" <?php if($currentInstance['titletype'] == 'p'){echo 'selected';}?>>P</option>
		</select>
		</p>

		<p>	<label for="<?php echo $this->get_field_id('customCssClass'); ?>"><?php _e( 'CSS Class:', 'pages_contents_widget' ); ?></label><br/>
        <input class="large-text" id="<?php echo $this->get_field_id('customCssClass'); ?>" name="<?php echo $this->get_field_name('customCssClass'); ?>" value="<?php echo $currentInstance['customCssClass']; ?>">
        </p>

        <p><label for="<?php echo $this->get_field_id('outputtype'); ?>"><?php _e( 'Output Type:', 'pages_contents_widget' ); ?></label><br/>
        	<select class="large-text" style="width:100%;" id="<?php echo $this->get_field_id('outputtype'); ?>" name="<?php echo $this->get_field_name('outputtype'); ?>">
        		<option value="normal" <?php if($currentInstance['outputtype'] == "normal"){echo 'selected=""';}?>><?php _e('Normal', 'pages_contents_widget' ); ?></option>
        		<option value="plaintext" <?php if($currentInstance['outputtype'] == "plaintext"){echo 'selected=""';}?>><?php _e('Plain Text', 'pages_contents_widget' ); ?></option>
        		<option value="forceptag" <?php if($currentInstance['outputtype'] == "forceptag"){echo 'selected=""';}?>><?php _e('Force P Tags', 'pages_contents_widget' ); ?></option>
        	</select>
        </p>
        <br/>
		<?php
	}

/*
* Update Widget
*/
	function update($new_instance, $old_instance){
   		$instance = $old_instance;
    	$instance['pageID'] = $new_instance['pageID'];
		$instance['titleEnable'] = $new_instance['titleEnable'];
		$instance['customCssClass'] = $new_instance['customCssClass'];
		$instance['outputtype'] = $new_instance['outputtype'];
		$instance['titletype'] = $new_instance['titletype'];
    	return $instance;
    }

/*
* Output Widget
*/
	function widget($args, $instance){
		extract($args, EXTR_SKIP);
		$pageID = $instance['pageID'];
		$titleEnable = $instance['titleEnable'];
		$customCssClass = $instance['customCssClass'];
		$outputType = $instance['outputtype'];
		if(isset($instance['titletype']) == false){
			$instance['titletype'] = 'h2';
		}
		$titletype = $instance['titletype'];
    	echo $before_widget;
		$args = array( 'page_id' => $pageID );
		$page = new WP_Query( $args );
		if($page->have_posts()) : $page->the_post();
			if($titleEnable == 'true'){
				echo '<'.$titletype . ' class="widget-title widgettitle">' . get_the_title() .'</'.$titletype.'>'; 
			}
			?>
			<div class="<?php echo (($customCssClass)?$customCssClass:'homepage_section'); ?>">
				<?php
				$content = get_the_content();
				if($outputType == 'plaintext'){
					echo strip_tags($content);
				}
				else if($outputType == 'forceptags'){
					$rsp = array("\r\n&nbsp;\r\n","\n&nbsp;\n","\r&nbsp;\r");
					$content = str_replace($rsp,"</p><p>",$content);
					$rsp2 = array("\r\n\r\n&nbsp;\r\n\r\n","\r\r&nbsp;\r\r","\n\n&nbsp;\n\n");
					$content = str_replace($rsp,"</p><br/><p>",$content);
					echo do_shortcode(apply_filters('the_content',"<p>"+$content+"</p>"));
				}
				else{
					echo do_shortcode(apply_filters('the_content',$content));
				}
				?>
				</div>
			<?php
		endif;
   		echo $after_widget;
   		wp_reset_postdata();
	}

}
// ------------------------------- End Page Content Display Widget ---------------------------------------------
// -------------------------------Begin Page Settings ----------------------------------------------------------

function theme_slug_customizer( $wp_customize ) {           
 
    //your section
        $wp_customize->add_section( 
            'page_settings_section', 
            array(
                'title' => esc_html__( 'Page Settings', 'theme_slug' ),
                'priority' => 150
            )
        );      
         
     
    //select sanitization function
        function theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }
     
     
    //add setting to your section
        $wp_customize->add_setting( 
            'page_layout_select', 
            array(
                'sanitize_callback' => 'theme_slug_sanitize_select'
            )
        );
         
        $wp_customize->add_control( 
            'page_layout_select', 
            array(
                'label' => esc_html__( 'Page Layout', 'theme_slug' ),
                'section' => 'page_settings_section',
                'type' => 'select',
                'choices' => array(
                    '' => esc_html__('Please select','theme_slug'),
                    '' => esc_html__('Boxed Layout','theme_slug'),
                    'full-width' => esc_html__('Full Width','theme_slug'),
                )
            )
        );      
     
}
add_action( 'customize_register', 'theme_slug_customizer' );
// -------------------------------End Page Settings ----------------------------------------------------------
// ------------------------------ Begin - Home Featured Ads post 	
function post_ads_select($wp_customize){
	$wp_customize->add_section('post_ads_section', array(
		'title' => __('Advert & HTML codes', 'mypostads'),
	));
	$wp_customize->add_setting('home_featured_ads', array(
	));
	// Home Featured Ads
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_ads_control',  array(
        'label'      => 'Home Featured Ads & HTML',
        'section'    => 'post_ads_section',
        'settings'   => 'home_featured_ads',
		'type' => 'textarea'
    ) ) 
);
	// ADS shortcode html
	$wp_customize->add_setting('ads_shortcode_link', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ads_shortcode_link_control',  array(
        'label'      => 'ADS Shortcode HTML',
        'section'    => 'post_ads_section',
        'settings'   => 'ads_shortcode_link',
		'type' => 'textarea'
    ) ) 
);	
	// Post middle Ads
	$wp_customize->add_setting('post_middle_ads', array(
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_middle_ads_control',  array(
        'label'      => 'Post Middle Ads',
        'section'    => 'post_ads_section',
        'settings'   => 'post_middle_ads',
		'type' => 'textarea'
    ) ) 
);

}
add_action('customize_register', 'post_ads_select');


//******************************************************* Smartzoz************************************************************************//
// =------------------------- Begin old counrty short code - needed ------- modified-----------------------
// Shortcode Amazon
function amaz_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
return '<div class="button-buy buy-amazon">
<a href="'.$atts['src'].'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/amazon_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">'.$content.'</span></a>
</div>';
}
add_shortcode('amz', 'amaz_post');

// Shortcode Flipkart
function flipk_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
return '<div class="button-buy buy-flipkart">
<a href="'.$atts['src'].'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/flipkart_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">'.$content.'</span></a></div>';
}
add_shortcode('flip', 'flipk_post');

// Shortcode Bestbuy
function bestbuy_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
return '<div class="button-buy buy-bestbuy">
<a href="'.$atts['src'].'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/bestbuy_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">'.$content.'</span></a></div>';
}
add_shortcode('bestb', 'bestbuy_post');

// Shortcode Walmart
function walmart_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
return '<div class="button-buy buy-walmart">
<a href="'.$atts['src'].'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/walmart_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">'.$content.'</span></a></div>';
}
add_shortcode('walmart', 'walmart_post');
 // ip SHORT CODE SMARTZOZ in,us,uk
 function if_statement($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'code'   => '' ), $atts );
//  $userInfo = geoip_detect2_get_info_from_current_ip();
//  if ($userInfo->country->isoCode == $atts['code'] )  {
//    return do_shortcode($content) ;

	$blog_id = get_current_blog_id();
  	if ($atts['code'] == 'IN') {
		if ( 9 == $blog_id ) {
    		return do_shortcode($content) ;	  	
  		}  
  	}
  elseif ($atts['code'] == 'US') {
   if ( 1 == $blog_id ) {
    		return do_shortcode($content) ;	  	
  		}  
  	}
 }
add_shortcode('if', 'if_statement');
// -------------------- End Old country short-code needed------------
/***********====================================== Short Code in Use ******************/
//======================= Post Midle advert shortcode ================================================================================
function ads() {
	$blog_id = get_current_blog_id();
	   return get_theme_mod('ads_shortcode_link')  ;
 }
add_shortcode('ads', 'ads');

//-------------------------Shortcodes Buy (in use)------------------------------------------------------------------------------ 

// Shortcode Amazon
function amz_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
	 if(!empty($content)) {
return '<div class="button-buy buy-amazon">
<a href="'.$content.'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/amazon_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">Buy at Amazon</span></a>
</div>'; 
}
}
add_shortcode('amzn', 'amz_post');

// Shortcode Flipkart
function flipkt_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
	 if(!empty($content)) {
return '<div class="button-buy buy-flipkart">
<a href="'.$content.'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/flipkart_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">Buy at Flipkart</span></a></div>';
}
}
add_shortcode('flipn', 'flipkt_post');

// Shortcode Bestbuy
function bestbuyn_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
	 if(!empty($content)) {
return '<div class="button-buy buy-bestbuy">
<a href="'.$content.'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/bestbuy_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">Buy at Best Buy</span></a></div>';
}
}
add_shortcode('bestbn', 'bestbuyn_post');

// Shortcode Walmart
function walmartn_post($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
	 if(!empty($content)) {
return '<div class="button-buy buy-walmart">
<a href="'.$content.'" target="_blank"><span class="button-icon">
<img src="/wp-content/images/images1/walmart_icon.jpg" width="" height="" /></span>
<span class="button-icon-text">Buy at Walmart</span></a></div>';
}
}
add_shortcode('walmartn', 'walmartn_post');
// ----------------------- Country content ---------------------
 function usc($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts );
		$blog_id = get_current_blog_id();
		if ( 1 == $blog_id ) {
			return do_shortcode($content) ;
		}
}
    add_shortcode('USC', 'usc');

	
 function inc($atts, $content) {
	 $atts = shortcode_atts( array(
	 	'src'   => '' ), $atts );
		$blog_id = get_current_blog_id();
		if ( 9 == $blog_id ) {
			return do_shortcode($content) ;
 }
 }
    add_shortcode('INC', 'inc');

// --------------------------- COUNTRY NAME -----
function cname() {
	$blog_id = get_current_blog_id();
	if ( 1 == $blog_id ) {
	   return 'USA'  ;
   }
   elseif ( 9 == $blog_id ){
	   return 'India'  ;
   }
}
  add_shortcode('CNAME', 'cname');
  //-------------- Begin Star Rating - Shortcode----------- 
function starrate($atts, $content) {
	$atts = shortcode_atts( array(
	 	'src'   => '' ), $atts ); 
	if ( $content == 1 ) {
	return '<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>';
}
elseif ( $content == 2 ) {
	return '<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>';
}
elseif ( $content == 3 ) {
	return '<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>';
}
elseif ( $content == 4 ) {
	return '<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>';
}
else {
	return '<div class="aps-rating-bar-box">
					<div class="aps-overall-rating aps-animated" data-bar="true" data-rating="'.$content.'">
						<span class="aps-total-wrap">
							<span class="aps-total-bar aps-green-bg" data-type="bar" style="width: '.$content.'%;"</span>
						</span>
						<span class="aps-rating-total" data-type="num">'.$content.'</span>
					</div>
				</div>';
}
}
add_shortcode('rating', 'starrate');
/* ------ Shortcode for Auto update title month and year -------------- */
// Enable Post Meta Shortcode Support
add_filter( 'single_post_title', 'do_shortcode' );

// Enable Post Title Shortcode
add_filter( 'the_title', 'do_shortcode' );
// ---------------- End Star Rating - shortcode-------------
// Current month & Year In Post Title Shortcode
 add_shortcode( 'myear' , 'current_year' );
    function current_year() {
$dt1 = date('d');
if ( $dt1 <=20 ) {
$year = date("Y F");
}
elseif ($dt <=26) {
$year1 = date("Y F");
$year2 = date('F',strtotime("+1 month"));
$year = $year1 ." - ". $year2;
}
else {
$year = date('Y F',strtotime("+1 month"));
}
return "$year";
}
/*  ------ End - Shortcode for Auto update title month and year -------------- */

//========================================= End Shortcode ===============================================
// ------------------------------------------------ ADs inside content -------------------------------------//
  
//Insert ads after second paragraph of single post content.
 
add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {     
    if ( is_single() && ! is_admin() ) {
        return prefix_insert_after_paragraph( get_theme_mod('post_middle_ads') , 6, $content );
    }
    return $content;
}
  
// Parent Function that makes the magic happen
  
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }    

    return implode( '', $paragraphs );
}
// ------------------------------------------------ End ADs inside content -------------------------------------//

// Shortcode support to Yoast Meta Title using 'wpseo_title' filter
add_filter('wpseo_title', 'filter_wpseo_title');
function filter_wpseo_title($title) {
  $title = do_shortcode($title);  
  return $title;
}

// Make sorting the post by modified date on Archive pages
function orderby_modified_posts( $query ) {
    if($query->is_main_query()) {
            $query->set( 'orderby', 'modified' );
       }
}
add_action( 'pre_get_posts', 'orderby_modified_posts' );



