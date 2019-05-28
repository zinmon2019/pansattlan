<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
include_once('config/config.php');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$shoppingcart_settings = shoppingcart_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header">
	<div class="header-wrap">
			<?php the_custom_header_markup(); ?>
		<!-- Top Header============================================= -->
		<div class="top-header">
			<?php 
			if ($shoppingcart_settings['shoppingcart_disable_top_bar'] ==0 ){

				if(is_active_sidebar( 'shoppingcart_header_info' ) || has_nav_menu( 'top-menu' ) || (has_nav_menu( 'social-link' ) )): ?>
					<div class="top-bar">
						<div class="wrap">
							<?php
							if( is_active_sidebar( 'shoppingcart_header_info' )) {

								dynamic_sidebar( 'shoppingcart_header_info' );

							} ?>
							<div class="right-top-bar">

								<?php
								if($shoppingcart_settings['shoppingcart_top_social_icons'] == 0):

										do_action('shoppingcart_social_links');

								endif;


								if(has_nav_menu ('top-menu')){ ?>

									<div class="top-bar-menu">
										<div class="top-menu-toggle">			
											<i class="fa fa-bars"></i>
									  	</div>
										<?php
											wp_nav_menu( array(
												'container' 	=> '',
												'theme_location' => 'top-menu',
												'depth'          => 1,
												'items_wrap'      => '<ul class="top-menu">%3$s</ul>',
											) );
										?>
									</div> <!-- end .top-bar-menu -->
								<?php } ?>

							</div> <!-- end .right-top-bar -->
						</div> <!-- end .wrap -->
					</div> <!-- end .top-bar -->
				<?php endif;
			} ?>

			<div id="site-branding">
				<div class="wrap">
					<div class="header-logo">

						<?php do_action('shoppingcart_site_branding'); ?>
					</div>

					<div class="header-right">
						<?php
						$search_form = $shoppingcart_settings['shoppingcart_search_custom_header'];
						if (1 != $search_form) { ?>

							<div id="search-box" class="clearfix">
								<?php 
									if (! class_exists('woocommerce')) {

										get_search_form();

									} else {

										get_product_search_form();

									}
								?>
							</div>
							 <!-- end #search-box -->
						<?php } 

						do_action ('shoppingcart_cart_wishlist_icon_display'); ?>
						<div class="login-box">
							<a href="<?php echo get_stylesheet_directory_uri(); ?>/my-account/">
								<button class="login">
								<i class="fa fa-sign-in"></i>အေကာင့္၀င္ရန္</button></a>
							<a href="<?php echo get_stylesheet_directory_uri(); ?>/my-account/"><button class="logout"><i class="fa fa-sign-out"></i>အေကာင့္ဖြင့္ရန္</button></a>
						</div> 
					</div> <!-- end .header-right -->
				</div><!-- end .wrap -->	
			</div><!-- end #site-branding -->

			<!-- Main Header============================================= -->
			<!--banner-->
			<?php
		if ($shoppingcart_settings['shoppingcart_adv_ban_position'] =='above-slider'){

			do_action ('shoppingcart_adv_banner_top');
		}

		if ($shoppingcart_settings['shoppingcart_display_advertisement'] =='above-slider'){
			do_action ('shoppingcart_advertisement_display');  // Display Advertisemenet banner above slider
		} ?>
		<!--end banner-->
			<div id="sticky-header" class="clearfix">
				<div class="wrap">
					<div class="main-header clearfix">

						<!-- Main Nav ============================================= -->
						<?php $header_display = $shoppingcart_settings['shoppingcart_header_display']; ?>
							<div id="site-branding">

								<?php
								if ($header_display == 'header_logo' || $header_display == 'show_both') {

									shoppingcart_the_custom_logo();

								}
								if ($header_display == 'header_text' || $header_display == 'show_both') { ?>
								<div id="site-detail">
									<div id="site-title">
										<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
									</div><!-- end .site-title --> 
									<?php
									$site_description = get_bloginfo( 'description', 'display' );
									if ($site_description){ ?>
										<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
									<?php } ?>
								</div>
							</div><!-- end #site-branding -->
							<?php }

							if (has_nav_menu('catalog-menu') ){
								$locations = get_nav_menu_locations();
								$menu_object = get_term( $locations['catalog-menu'], 'nav_menu' );
							?>

								<div class="show-menu-toggle">
								<span class="bars"></span>		
									<span class="sn-text"><?php echo esc_attr($menu_object->name);  ?></span>
								</div>

						<?php }
						if($shoppingcart_settings['shoppingcart_disable_main_menu']==0){ ?>

							<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
								); ?>
							
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php wp_nav_menu($args);//extract the content from apperance-> 
								/** show menu by custom tag **/
								// $my_sub_items_html ="";
								// $categories = get_categories('taxonomy=product_tag');
 
								// foreach($categories as $category){
								// if($category->count > 0){
								// 	$my_sub_items_html .= "<li><a href='author?author=".$category->slug."'>".$category->name."</a></li>";
								//     $select.= "<a href='author?author=".$category->slug."'>".$category->name."</a>";
								// }
								// }
								// $my_wp_nav_menu = wp_nav_menu(array(
								  
								//     'container' => 'ul', 
								//     'theme_location' => 'primary',  
								//     'echo' => false
								// ));

								// $my_wp_nav_menu = str_replace(
								//     '>စာေရးဆရာအမည္</a></li>', 
								//     ' class="sub">စာေရးဆရာအမည္ </a><ul class="sub-menu">'.$my_sub_items_html.'</ul></li>', 
								//     $my_wp_nav_menu
								// );

								// echo $my_wp_nav_menu;
								/** end menu by custom tag **/
								} else {// extract the content from page menu only ?>
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
								} ?>
							</nav> <!-- end #site-navigation -->

						<?php } ?>
							<div class="header-right">
								<?php do_action ('shoppingcart_cart_wishlist_icon_display'); ?>
							</div> <!-- end .header-right -->

					</div> <!-- end .main-header -->
				</div> <!-- end .wrap -->
					</div> <!-- end #sticky-header -->
				</div>
				<!-- end .top-header -->

	</div> <!-- end .header-wrap -->
	<!--book-shelf-->
	<?php if(is_front_page()){?>
	<div class="box">
    	<!--book-shelf-->
	<?php if(is_front_page()){?>
	<?php 
      $args = array(
          'post_type'      => 'product',
          'product_cat'    => 'Best seller',
          'meta_key' => 'select_ranking',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'posts_per_page' => 10,
          'meta_query'        => array(
						    array(
						        'key' => 'select_ranking',
						        'value'   => array(''),
						        'compare' => 'NOT IN'
						    )
						),
        
      );
      $loop = new WP_Query( $args );
	?>
	<div class="box">
    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shelf.jpg">
        <div class="best-seller">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/best-seller.png">
        </div>
        <div class="best-seller-text">
        	<?php
        		$current_month = date('n');
        		foreach ($month as $key => $value) {
			      	if($key == $current_month)echo $value.'လ အေရာင္းရဆံုး စာအုပ္(၁၀)အုပ္';
			      }
        	?>
        </div>
        <?php
        	$i = 1;
        	while ( $loop->have_posts() ) : $loop->the_post();
        ?>
		    	<div class="book<?php echo $i; ?>">
		       	<?php
		       	echo '<a href="'.get_permalink().'" class="best-seller-book" >' .get_the_post_thumbnail( $loop->ID, 'full' ).' </a>';
		       	?>
		        </div>
		<?php
			$i++;
			// echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' </a>';
		    endwhile;
        ?>
        <div class="best_seller_button">
        	<a href="http://localhost/pann-satt-lann/best-seller/"><button>အေရာင္းရဆံုးစာအုပ္မ်ားျကည့္ရန္</button></a>
        </div>

    </div>
	<?php }?>
    </div>
	<?php }?>
	<!-- end book-shelf-->
</header> <!-- end #masthead -->
<!-- Main Page Start ============================================= -->
<div class="site-content-contain">
	<div id="content" class="site-content">

	<?php
	

	
