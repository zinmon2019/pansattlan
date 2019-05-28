<?php 
/**************** Categoy Lists ***********************/

// if( !function_exists( 'shoppingcart_categories_lists' ) ):
//     function shoppingcart_categories_lists() {
//         $shoppingcart_cat_args = array(
//             'type'       => 'post',
//             'taxonomy'   => 'category',
//         );
//         $shoppingcart_categories = get_categories( $shoppingcart_cat_args );
//         //var_dump($shoppingcart_categories);
//         $shoppingcart_categories_lists = array('' => esc_html__('--Select--','shoppingcart'));
//         foreach( $shoppingcart_categories as $category ) {
//             $shoppingcart_categories_lists[esc_attr( $category->slug )] = esc_html( $category->name );
//         }
//         return $shoppingcart_categories_lists;

//     }
// endif;

/**************** Product Categoy Lists ***********************/
if( !function_exists( 'shoppingcart_product_categories_lists_child' ) ):

    function shoppingcart_product_categories_lists_child() {
		$shoppingcart_prod_categories_lists = array(
			'-' => __( '--Select Category data--', 'shoppingcart' ),
		);

		//var_dump($shoppingcart_prod_categories_lists);
		$shoppingcart_prod_categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => 0,
				'title_li'   => '',
			)
		);
		// var_dump($shoppingcart_prod_categories);
		if ( ! empty( $shoppingcart_prod_categories ) ) :
			foreach ( $shoppingcart_prod_categories as $shoppingcart_prod_cat ) :

				if ( ! empty( $shoppingcart_prod_cat->term_id ) && ! empty( $shoppingcart_prod_cat->name ) ) :
					$shoppingcart_prod_categories_lists[ $shoppingcart_prod_cat->term_id ] = $shoppingcart_prod_cat->name;
				endif;

			endforeach;
		endif;

		return $shoppingcart_prod_categories_lists;
	}

endif;

if(!function_exists('shoppingcart_get_theme_options')):
	function shoppingcart_get_theme_options() {
	    return wp_parse_args(  get_option( 'shoppingcart_theme_options', array() ), shoppingcart_get_option_defaults_values() );
	}
endif;




?>