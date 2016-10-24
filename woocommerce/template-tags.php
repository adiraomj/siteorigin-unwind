<?php
/**
 * Custom WooCommerce template tags for this theme.
 *
 * @package siteorigin-unwind
 * @since siteorigin-unwind 0.9
 * @license GPL 2.0
 */

/**
 * The following functionality is focused on handling product archives and product loops.
 **/

// Move the price higher.
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 4 );

// Move the result count.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 35 );

// Use a custom upsell function to change number of items.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'siteorigin_unwind_woocommerce_output_upsells', 15 );

// Remove the cross sell display.
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

function siteorigin_unwind_loop_image_div_open() {
	echo '<div class="product-loop-image">';
}
function siteorigin_unwind_loop_image_div_close() {
	echo '</div>';
}
// Inserting an anchor tag around product title.
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'siteorigin_unwind_loop_product_title', 10 );
function siteorigin_unwind_loop_product_title() {
	echo '<a href="' . get_the_permalink() . '"><h3>' . get_the_title() . '</h3></a>';
}
// Insert
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
