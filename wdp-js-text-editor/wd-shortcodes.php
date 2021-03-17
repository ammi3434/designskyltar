<?php
// shortcode for products
add_shortcode( 'wdp-frontend-view', 'wdp_frontend_view_shortcode' );

 

function wdp_frontend_view_shortcode() {

    ob_start();

	 wdp_frontend_view();

     $content = ob_get_clean();

        return $content;

}

// function your_function_name() {
//     $to = "mattiasg_94@hotmail.com";
//     $subject = 'The subject';
//     $body = 'The email body content';
//     $headers = array('Content-Type: text/html; charset=UTF-8');
//     wp_mail( $to, $subject, $body, $headers );
// }
// add_action( 'wp_loaded', 'your_function_name' );
