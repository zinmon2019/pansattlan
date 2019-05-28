<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
/*********************** shoppingcart Category SLIDERS ***********************************/

function new_slider() {
	$shoppingcart_settings = shoppingcart_get_theme_options();
	if($shoppingcart_settings['shoppingcart_default_category']=='post_category'){
		$category = $shoppingcart_settings['shoppingcart_default_category_slider'];
		$query = new WP_Query(array(
					'posts_per_page' =>  intval($shoppingcart_settings['shoppingcart_slider_number']),
					'post_type' => array(
						'post'
					) ,
					'category_name' => esc_attr($shoppingcart_settings['shoppingcart_default_category_slider']),
				));
	} else {
		$category = $shoppingcart_settings['new_slider'];
		$query = new WP_Query( array(
			'post_type' => 'product',
			'orderby'   => 'date',
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'id',
					'terms'     => intval($category),
				)
			),
			'posts_per_page' => intval($shoppingcart_settings['shoppingcart_slider_number']),
			) );

	}
	
	if($query->have_posts() && !empty($category)){
		$category_sliders_display = '';
		$category_sliders_display 	.= '<!-- Main Slider ============================================= -->';
		$category_sliders_display 	.= ' <div class="main-slider">';
		$category_sliders_display 	.= '<div class="layer-slider">';
		$category_sliders_display 	.= '<ul class="slides">';
		while ($query->have_posts()):$query->the_post();

				$category_sliders_display    	.= '<li>';
				$category_sliders_display 	.= '<div class="image-slider">';
				$category_sliders_display 	.= '<article class="slider-content">';
				$category_sliders_display 	.= '<div class="slider-image-content">';
				$category_sliders_display 	.= '<a href="'.esc_url(get_permalink()).'" title="'.the_title_attribute('echo=0').'">';
				$category_sliders_display 	.= get_the_post_thumbnail();

				$category_sliders_display 	.= '<div>';					
				$category_sliders_display 	.= '<div>';	
				$category_sliders_display 	.= get_the_title();
				$category_sliders_display 	.= '</div>';
				
				$category_sliders_display 	.= '<div>';	
				$category_sliders_display 	.= get_post_meta( get_the_ID(), '_regular_price', true);
				$category_sliders_display 	.= get_woocommerce_currency_symbol();
				$category_sliders_display 	.= '</div>';
				
				$category_sliders_display 	.= '<div>';	
				$category_sliders_display 	.=	wc_get_product( get_the_ID() )->get_average_rating();
				$category_sliders_display 	.=	'('.wc_get_product( get_the_ID() )->get_rating_count().'review'.')';
				$category_sliders_display 	.= '</div>';
				$category_sliders_display 	.= '</div>';
				$category_sliders_display 	.= '</a>';


				$category_sliders_display 	.='</div> <!-- .slider-image-content -->';
				$category_sliders_display 	.='</article> <!-- end .slider-content -->';
				$category_sliders_display 	.='</div> <!-- end .image-slider -->';
				$category_sliders_display 	.='</li>';
			endwhile;
			wp_reset_postdata();
			$category_sliders_display .= '</ul><!-- end .slides -->
				</div> <!-- end .layer-slider -->
			</div> <!-- end .main-slider -->';
				echo $category_sliders_display;
			}
			
}