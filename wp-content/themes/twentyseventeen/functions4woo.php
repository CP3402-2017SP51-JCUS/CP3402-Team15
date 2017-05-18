<?php
/**
 * Created by PhpStorm.
 * User: Jennifer
 * Date: 5/6/2017
 * Time: 3:00 PM
 */

// Remove SKU
add_filter( 'wc_product_sku_enabled', '__return_false' );

// Remove Product Category field
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Change the breadcrumb home text from 'Home' to 'Shop'
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    $defaults['home'] = 'Shop';
    return $defaults;
}

// Change the home breadcrumb URL
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return 'http://localhost/wp/shop-categories';
}

// Change the breadcrumb delimiter from '/' to '>'
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
    $defaults['delimiter'] = ' &gt; ';
    return $defaults;
}


// Display 20 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 20;' ), 20 );