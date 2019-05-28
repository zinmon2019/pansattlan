<?php
/**
 * The template for displaying all pages.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
get_header();
$shoppingcart_settings = shoppingcart_get_theme_options();
$shoppingcart_display_page_single_featured_image = $shoppingcart_settings['shoppingcart_display_page_single_featured_image'];
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post(); ?>
			<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if(has_post_thumbnail() && $shoppingcart_display_page_single_featured_image == 0 ){ ?>
					<div class="post-image-content">
						<figure class="post-featured-image">
							<?php the_post_thumbnail(); ?>
						</figure>
					</div><!-- end.post-image-content -->
				<?php } ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div> <!-- entry-content clearfix-->
				<?php
				wp_link_pages( array( 
						'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.esc_html__( 'Pages:', 'shoppingcart' ),
						'after'             => '</div>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'pagelink'          => '%',
						'echo'              => 1
						) );
				comments_template(); ?>
			</article>
			<?php }
			} else { ?>
			<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'shoppingcart' ); ?> </h1>
			<?php
			} ?>
			<?php if ( !is_front_page()) : ?>
				<?php 
						switch ($wp->request) {
							case 'book-categories':
								get_template_part( 'content-book-categories', 'book' ); 
								break;
						}
					 ?>
			<?php else : ?>
				<!-- Main Slider ============================================= -->
	<div class="product-slider-one">
	<a href=""><p class="product-name">အသစ္ထြက္လူျကိုက္မ်ားစာအုပ္မ်ား</h3></p>
	<?php
		$shoppingcart_enable_slider = $shoppingcart_settings['shoppingcart_enable_slider'];
		if ($shoppingcart_enable_slider=='frontpage'|| $shoppingcart_enable_slider=='enitresite'){
			 if(is_front_page() && ($shoppingcart_enable_slider=='frontpage') ) {
			 	echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');


			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {
						child_shoppingcart_category_sliders();


					} else {

						if(class_exists('ShoppingCart_Plus_Features')):
							do_action('shoppingcart_image_sliders');
						endif;
					}

			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
			if($shoppingcart_enable_slider=='enitresite'){
				echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');

			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {

							shoppingcart_category_sliders();

					} else {

						if(class_exists('ShoppingCart_Plus_Features')):

							do_action('shoppingcart_image_sliders');

						endif;
					}
			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
		}
		
		if ($shoppingcart_settings['shoppingcart_adv_ban_position'] =='below-slider'){

			do_action ('shoppingcart_adv_banner_top');
		}
		if ($shoppingcart_settings['shoppingcart_display_advertisement'] =='below-slider'){ // Display Advertisemenet banner below slider
			do_action ('shoppingcart_advertisement_display');
		} ?>
		<div class="more-product">
			<a href=""><button>ပိုမိုရွာရန္</button></a>
		</div>
	</div>
	<!-- Main Slider ============================================= -->
	<div class="product-slider-two">
	<a href=""><p class="product-name">သင့္အတြက္ေရြးခ်ယ္ေပးထားသည့္စာအုပ္မ်ား</p></a>
	<?php
		$shoppingcart_enable_slider = $shoppingcart_settings['shoppingcart_enable_slider'];
		if ($shoppingcart_enable_slider=='frontpage'|| $shoppingcart_enable_slider=='enitresite'){
			 if(is_front_page() && ($shoppingcart_enable_slider=='frontpage') ) {
			 	echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');


			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {
						new_slider();


					} else {

						if(class_exists('ShoppingCart_Plus_Features')):
							do_action('shoppingcart_image_sliders');
						endif;
					}

			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
			if($shoppingcart_enable_slider=='enitresite'){
				echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');

			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {

							shoppingcart_category_sliders();

					} else {

						if(class_exists('ShoppingCart_Plus_Features')):

							do_action('shoppingcart_image_sliders');

						endif;
					}
			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
		}
		
		if ($shoppingcart_settings['shoppingcart_adv_ban_position'] =='below-slider'){

			do_action ('shoppingcart_adv_banner_top');
		}
		if ($shoppingcart_settings['shoppingcart_display_advertisement'] =='below-slider'){ // Display Advertisemenet banner below slider
			do_action ('shoppingcart_advertisement_display');
		} ?>
		<div class="more-product">
			<a href=""><button>ပိုမိုရွာရန္</button></a>
		</div>
	</div>
		<!-- Main Slider ============================================= -->
	<div class="product-slider-three">
		<a href=""><p class="product-name">ပန္းဆက္လမ္းတိုက္ထုတ္စာအုပ္မ်ား</p></a>
	<?php
		$shoppingcart_enable_slider = $shoppingcart_settings['shoppingcart_enable_slider'];
		if ($shoppingcart_enable_slider=='frontpage'|| $shoppingcart_enable_slider=='enitresite'){
			 if(is_front_page() && ($shoppingcart_enable_slider=='frontpage') ) {
			 	echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');


			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {
						second_new_slider();


					} else {

						if(class_exists('ShoppingCart_Plus_Features')):
							do_action('shoppingcart_image_sliders');
						endif;
					}

			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
			if($shoppingcart_enable_slider=='enitresite'){
				echo '<div class="catalog-slider-promotion-box clearfix">
			 	<div class="catalog-slider-promotion-wrap">
			 	<div class="catalog-slider-promotion-inner">';
				do_action ('shoppingcart_side_nav_menu');

			 		if($shoppingcart_settings['shoppingcart_slider_type'] == 'default_slider') {

							shoppingcart_category_sliders();

					} else {

						if(class_exists('ShoppingCart_Plus_Features')):

							do_action('shoppingcart_image_sliders');

						endif;
					}
			 	do_action ('shoppingcart_product_promotions');
			 	echo '</div> <!-- end .catalog-slider-promotion-inner --></div></div> <!-- end .catalog-slider-promotion-wrap -->';
				
			}
		}
		
		if ($shoppingcart_settings['shoppingcart_adv_ban_position'] =='below-slider'){

			do_action ('shoppingcart_adv_banner_top');
		}
		if ($shoppingcart_settings['shoppingcart_display_advertisement'] =='below-slider'){ // Display Advertisemenet banner below slider
			do_action ('shoppingcart_advertisement_display');
		} ?>
		<div class="more-product">
			<a href=""><button>ပိုမိုရွာရန္</button></a>
		</div>
</div>
			<?php endif; ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();
?>
<script type="text/javascript">
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });


</script>