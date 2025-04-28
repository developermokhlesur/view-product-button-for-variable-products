<?php
// Add a "View Product" button for variable products in WooCommerce loop
add_filter('woocommerce_loop_add_to_cart_link', 'custom_view_product_button_for_variable_products', 10, 2);

function custom_view_product_button_for_variable_products($button, $product) {
    // Check if the product exists and is a variable type
    if ($product && $product->is_type('variable')) {
        // Get the product page URL
        $url = get_permalink($product->get_id());
        // Button text
        $button_text = __('View Product', 'woocommerce');
        // Return the custom button HTML
        return '<a class="button view-product-button" href="' . esc_url($url) . '">' . esc_html($button_text) . '</a>';
    }
    // Return the original button for non-variable products
    return $button;
}
?>
