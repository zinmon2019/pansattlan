<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
// $shoppingcart_categories_lists = shoppingcart_categories_lists();
// var_dump($shoppingcart_categories_lists);

/******************** SHOPPINGCART SLIDER SETTINGS ******************************************/
$shoppingcart_settings = shoppingcart_get_theme_options();
if(class_exists( 'woocommerce' )) {
	$shoppingcart_prod_categories_lists = shoppingcart_product_categories_lists_child();
	// print_r($shoppingcart_prod_categories_lists);
	
function slider_customizer( $wp_customize )
{
  $wp_customize->add_setting(
			'shoppingcart_theme_options[new_slider]', array(
				'default'				=>array(),
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'shoppingcart_sanitize_category_select',
				'type'				=> 'option'
			)
		);
		$wp_customize->add_control(
			'shoppingcart_theme_options[new_slider]',
			array(
				'priority'    => 20,
				'label'       => __( 'Select Products Category Slider 1', 'shoppingcart-child' ),
				'description' => __('Slider Recommended image size is ( 1500 X 850 )','shoppingcart'),
				'section'     => 'featured_content',
				'settings'				=> 'shoppingcart_theme_options[new_slider]',
				'choices'     => $shoppingcart_prod_categories_lists,
				'type'        => 'select',
				'active_callback' => 'shoppingcart_product_category_callback',
			)
			
		);

		$wp_customize->add_setting(
			'shoppingcart_theme_options[second_new_slider]', array(
				'default'				=>array(),
				'capability'			=> 'manage_options',
				'sanitize_callback'	=> 'shoppingcart_sanitize_category_select',
				'type'				=> 'option'
			)
		);
		$wp_customize->add_control(
			'shoppingcart_theme_options[second_new_slider]',
			array(
				'priority'    => 20,
				'label'       => __( 'Select Products Category Slider 2', 'shoppingcart-child' ),
				'description' => __('Slider Recommended image size is ( 1500 X 850 )','shoppingcart'),
				'section'     => 'featured_content',
				'settings'				=> 'shoppingcart_theme_options[second_new_slider]',
				'choices'     => $shoppingcart_prod_categories_lists,
				'type'        => 'select',
				'active_callback' => 'shoppingcart_product_category_callback',
			)
		);
}
add_action( 'customize_register', 'slider_customizer' );
}




	