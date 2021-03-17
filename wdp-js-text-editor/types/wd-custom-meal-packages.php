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
 * 
 * ======================
 *******************************************************************************************/
if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
//This function creates a custom post type of the name wdlrproducts

function wd_product_subscription(){?>

<ul class="oo-subcription cf">
	<li>
		<input type="radio" id="whole-bean" name="prdouctcat" value="Whole Bean">
		<label for="whole-bean">Whole Bean</label>
	</li>
	<li>
		<input type="radio" id="ground" name="prdouctcat" value="Ground">
		<label for="ground">Ground</label>
	</li>
	<li>
		<input type="radio" id="whole-bean-with-mystery-kit" name="prdouctcat" value="Whole bean with Mystery kit">
		<label for="whole-bean-with-mystery-kit">Whole bean with Mystery kit</label>
	</li>
</ul>

<div id="wd-products" class="wd-products">
</div>
<div id="wd-add-to-cart"></div>
<?php
}
?>