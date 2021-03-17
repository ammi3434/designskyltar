<?php
/********************************************************************************************
 * Author: Syed Tahir Rasul | WordPressDepartment
 * Plugin URI: https://www.wordpressdepartment.com
 * Author URI: https://www.wordpressdepartment.com
 *
 * Copyright (C) WordPress Department of OOGLOO - Web & Beyond, LLC. - All Rights Reserved under OOGLOO - Web & Beyond, LLC Proprietary License
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * You can contact the developers of this plugin, Team WordPressDepartment,  at email address info@wordpressdepartment.com.
 * ======================
 * Custom Post Type: Packages
 * ======================
 *******************************************************************************************/
if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
//This function creates a custom post type of the name wdlrproducts
function wd_get_product_of_selected_cat(){
    
	    $wd_produc_cat= $_REQUEST['wd_produc_cat'];
	    
	    $args = array( 
		'post_type' => 'product',
		'post_status'=>'publish',
		'tax_query'	=>  array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'name',
						'terms' => $wd_produc_cat,
					),
				),
		); ?>
		<link rel="stylesheet" id="wd-slick-slide-css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css" type="text/css" media="all">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" id="wd-cdn-slick-js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js" id="wd-cdn-slick-js"></script>


<script>
   jQuery(document).ready(function($){
  $('.carousel').slick({
  slidesToShow: 3,
  dots:true,
  centerMode: false,
  });
});</script>
	
	<?php		
	$wd_products = get_posts($args);
	 $product_html .= '<div id="owl-carousel" class="owl-carousel owl-theme wd-subscription-row slider carousel">';?>
	 <div class="carousel-nav clearfix">
    <span id="prv-testimonial" alt="PREV"> < </span> 
    <span id="nxt-testimonial" alt="NEXT"> > </span>
    </div>
	 <?php
	foreach( $wd_products as $wd_product ){
	    $product = wc_get_product( $wd_product->ID );
	    $product_html .= '<div class="wd-subscription-col item slide">';
	    $product_html .= '<div class="wd-subscription-title">';
	    $product_html .= '<h2>'. get_the_title( $wd_product->ID ).'</h2>';
	    $product_html .= '</div>';
	    $product_html .= '<div class="wd-subscription-img">';
	    $product_html .= get_the_post_thumbnail( $wd_product->ID, 'medium' );
	    $product_html .= '</div>';
	    $product_html .= '<div id="'.$wd_product->ID.'" class="wd-subscription-price"><span><span>$</span>';
	    $product_html .= '</span></div>';
	    
	   $handle=new WC_Product_Variable($wd_product->ID);
        $variations1=$handle->get_children();
        $product_html .= '<ul class="wd-subscription-type">';
        foreach ($variations1 as $value) {
            $single_variation=new WC_Product_Variation($value);
            $product_html .='<li><input type="radio" data-id="'.$wd_product->ID.'"id="'.$value.'" name="variation" value="'.$value.'"><label for="'.$value.'">'.implode(" / ", $single_variation->get_variation_attributes()).'</label></li>';
        }
        $product_html .= '</ul>';
        $product_html .= '<div class="wd-subscription-btn">';
	    $product_html .='<input type="radio" data-id="'.$wd_product->ID.'"id="wd-select'.$value.'" name="wd-select-product" value="'.$wd_product->ID.'"><label for="wd-select'.$value.'">Select</label>';
	    $product_html .= '</div>';
        $product_html .= '</div>';
	 
	}
	 $product_html .= '</div>';
      echo $product_html; 
       	die();
}
add_action('wp_ajax_wd_get_product_of_selected_cat', 'wd_get_product_of_selected_cat');
add_action('wp_ajax_nopriv_wd_get_product_of_selected_cat', 'wd_get_product_of_selected_cat');
function wd_get_price_of_variation(){
    
	    $wd_variation_id= $_REQUEST['wd_variation_id'];
	     $single_variation=new WC_Product_Variation($wd_variation_id);
	    
	    
      echo $single_variation->price; 
       	die();
}
add_action('wp_ajax_wd_get_price_of_variation', 'wd_get_price_of_variation');
add_action('wp_ajax_nopriv_wd_get_price_of_variation', 'wd_get_price_of_variation');

function wd_show_add_to_cart_button(){
    
	    $wd_variation_id= $_REQUEST['wd_variation_id'];
	    $wd_variation_id= $_REQUEST['wd_product_id'];
	    echo '<a href="'.get_site_url().'cart/?add-to-cart='.$wd_variation_id.'&variation_id='.$wd_variation_id.'">Add to Cart</a>';
       	die();
}
add_action('wp_ajax_wd_show_add_to_cart_button', 'wd_show_add_to_cart_button');
add_action('wp_ajax_nopriv_wd_show_add_to_cart_button', 'wd_show_add_to_cart_button');