<?php
// A file that handles WooCommerce template functions.

/**
 * The following functionality is focused on handling product archives and product loops.
 **/

// Remove the default button below the products.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

// Remove opening and closing anchor tag for products.
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' );

// Inserting .product-loop-image class around the image
add_action( 'woocommerce_before_shop_loop_item_title', 'siteorigin_unwind_loop_image_div_open', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'siteorigin_unwind_loop_image_div_close', 15 );

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
