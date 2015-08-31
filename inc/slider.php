<?php
/**
 * Carousel template
 *
 * @package Oria
 */

	//Scripts
	function oria_slider_scripts() {
			wp_enqueue_script( 'oria-owl-script', get_template_directory_uri() .  '/js/owl.carousel.min.js', array( 'jquery' ), true );	
			wp_enqueue_script( 'oria-slider-init', get_template_directory_uri() .  '/js/slider-init.js', array(), true );						
			
			//Slider speed options
			if ( ! get_theme_mod('carousel_speed') ) {
				$slideshowspeed = 4000;
			} else {
				$slideshowspeed = intval(get_theme_mod('carousel_speed'));
			}			
			$slider_options = array(
				'slideshowspeed' => $slideshowspeed,
			);			
			wp_localize_script('oria-slider-init', 'sliderOptions', $slider_options);			
	}
	add_action( 'wp_enqueue_scripts', 'oria_slider_scripts' );

	//Template
	if ( ! function_exists( 'oria_slider_template' ) ) {
		function oria_slider_template() {
			$args = array('hide_empty' => 0);
			$categories = get_categories($args);
			?>
			<div class="oria-slider slider-loader">
				<div class="featured-inner clearfix">
					<div class="slider-inner">
					<?php foreach ( $categories as $category ) { ?>
						<div class="slide">
							<?php if (function_exists('z_taxonomy_image')) : ?>
								<?php if(z_has_taxonomy_image($category->term_id)):  ?>
									<?php z_taxonomy_image($category->term_id, 'oria-carousel'); ?>
								<?php else : ?>
									<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png"/>'; ?>
								<?php endif; ?>
							<?php else : ?>
								<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png"/>'; ?>
							<?php endif; ?>
							
							<?php echo '<h3 class="slide-title"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></h3>'; ?>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<?php
		}
	} ?>