<?php
/**
 * Plugin Name: Storefront AMP
 * Plugin URI: https://woocommerce.com/storefront
 * Description: An extension of AMP for Storefront
 * Version: 0.1
 * Author: Nicola Mustone
 * Author URI: https://nicolamustone.com/
 * Text Domain: storefront-amp
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'amp_post_template_file', 'storefront_amp_set_custom_template', 10, 3 );
function storefront_amp_set_custom_template( $file, $type, $post ) {
	if ( 'single' === $type ) {
		$file = dirname( __FILE__ ) . '/single.php';
	}

	return $file;
}

add_action( 'amp_post_template_css', 'storefront_amp_additional_css_styles' );
function storefront_amp_additional_css_styles( $amp_template ) {
	// only CSS here please...
	?>
	/**
	* Storefront AMP CSS
	*/
	body {
		background: <?php echo storefront_get_content_background_color(); ?>;
		color: <?php echo get_theme_mod( 'storefront_text_color' ); ?>;
		font-family: "Source Sans Pro",HelveticaNeue-Light,"Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
		padding-bottom: 0;
	}

	h1, h2, h3, h4, h5, h6 {
		color: <?php echo get_theme_mod( 'storefront_heading_color' ); ?>;
	}

	a, a:visited, a:hover {
		color: <?php echo get_theme_mod( 'storefront_accent_color' ); ?>;
	}

	a {
		font-weight: 600;
		text-decoration: none;
	}

	nav.amp-wp-title-bar {
		background: <?php echo get_theme_mod( 'storefront_header_background_color' ); ?>;
		color: <?php echo get_theme_mod( 'storefront_header_text_color' ); ?>
	}

	nav.amp-wp-title-bar a {
		color: <?php echo get_theme_mod( 'storefront_header_link_color' ); ?>;
	}

	nav.amp-wp-title-bar .amp-site-description {
		color: <?php echo get_theme_mod( 'storefront_header_text_color' ); ?>
	}

	ul.storefront-amp-wp-meta-taxonomy::before {
		content: "In: ";
		display: inline-block;
		line-height: 24px;
		overflow: hidden;
	}

	ul.storefront-amp-wp-meta-taxonomy {
		padding-top: 0;
	}

	amp-img {
		margin: 0 auto;
	}

	.site-footer {
		background-color: <?php echo get_theme_mod( 'storefront_footer_background_color' ); ?>;
		color: <?php echo get_theme_mod( 'storefront_footer_text_color' ); ?>;
		padding: 0.618em 16px;
	}

	.site-footer a:not(.button) {
		color: <?php echo get_theme_mod( 'storefront_footer_link_color' ); ?>;
	}

	code, kbd, tt, var, pre, samp {
		background-color: rgba(0,0,0,0.05);
		font-family: Monaco,Consolas,"Andale Mono","DejaVu Sans Mono",monospace;
		font-size: 0.8em;
		padding: .202em .53em;
	}
	<?php
}
