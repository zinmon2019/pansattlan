<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

require_once( get_stylesheet_directory(). '/inc/settings/shoppingcart-slider-functions.php' );

require_once( get_stylesheet_directory(). '/inc/settings/new_slider.php' );

require_once( get_stylesheet_directory(). '/inc/settings/second_new_slider.php' );

require_once( get_stylesheet_directory(). '/inc/customizer/shoppingcart-default-values.php' );

//require_once( get_stylesheet_directory(). '/inc/settings/shoppingcart-common-functions.php' );

//require_once( get_stylesheet_directory(). '/inc/customizer/functions/featured-content-customizer.php' ); 

function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js',
        array( 'jquery' )
    );

}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_topics_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Book', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Book category' ),
    'all_items' => __( 'All Book category' ),
    'parent_item' => __( 'Parent category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Book category' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('product_book_category',array('product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'product_book_category' ),
  ));
 
}


