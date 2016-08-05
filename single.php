<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
	<?php $this->load_parts( array( 'style' ) ); ?>
	<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>
<body>
<nav class="amp-wp-title-bar">
	<div>
		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
			<?php $site_icon_url = $this->get( 'site_icon_url' ); ?>
			<?php if ( $site_icon_url ) : ?>
				<amp-img src="<?php echo esc_url( $site_icon_url ); ?>" width="32" height="32" class="amp-wp-site-icon"></amp-img>
			<?php endif; ?>
			<?php echo esc_html( $this->get( 'blog_name' ) ); ?>
		</a>
	</div>
</nav>
<div class="storefront-amp-featured-image">
<?php
if ( has_post_thumbnail() ) :
	$data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	?>
	<amp-img src="<?php echo esc_url( $data[0] ); ?>" width="<?php echo esc_attr( $data[1] ); ?>" height="<?php echo esc_attr( $data[2] ); ?>" class="amp-wp-featured-image"></amp-img>
<?php endif; ?>
</div>
<div class="amp-wp-content">
	<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
	<ul class="amp-wp-meta">
		<?php $this->load_parts( apply_filters( 'amp_post_template_meta_parts', array( 'meta-author', 'meta-time' ) ) ); ?>
	</ul>
	<ul class="amp-wp-meta storefront-amp-wp-meta-taxonomy">
		<?php $this->load_parts( apply_filters( 'amp_post_template_meta_parts', array( 'meta-taxonomy' ) ) ); ?>
	</ul>
	<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
</div>
<footer class="storefront-amp-site-footer site-footer">
	<?php do_action( 'amp_post_template_footer', $this ); ?>

	<div class="site-info">
		<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
		<?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
		<br/> <?php printf( esc_attr__( '%1$s designed by %2$s.', 'storefront' ), 'Storefront', '<a href="http://www.woothemes.com" title="Premium WordPress Themes & Plugins by WooThemes" rel="author">WooThemes</a>' ); ?>
		<?php } ?>
	</div><!-- .site-info -->
</footer>
</body>
</html>
