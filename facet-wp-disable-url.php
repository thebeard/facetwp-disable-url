<?php
/*
 * Plugin Name: FacetWP Disable URLs
 * Version: 1.0
 * Plugin URI: https://github.com/thebeard
 * Description: Disables FacetWP URL Update
 * Author: Theunis Cilliers
 * Author URI: https://github.com/thebeard
 *
 * @package WordPress
 * @author Theunis Cilliers
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_head', 'disable_javascript_url_structure' );
function disable_javascript_url_structure() { ?>

	<script type="text/javascript">
		( function( $ ) {
			$( window ).load( disableJavascriptURL );

			function disableJavascriptURL() {
				if ( fwpSetHashMethodSet() ) FWP.set_hash = function() { return; };
			}

			function fwpSetHashMethodSet() {
				if ( typeof( FWP ) == 'object' && typeof( FWP.set_hash ) == 'function' )
					return true; else return false;
			}
		} )( jQuery );
	</script>

<?php }