<?php

/**

 * The template for displaying search forms in flatsome

 *

 * @package          Flatsome\Templates

 * @flatsome-version 3.16.0

 */
$placeholder = __( 'Search', 'woocommerce' ).'&hellip;';
if(get_theme_mod('search_placeholder')) $placeholder = get_theme_mod('search_placeholder');
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="flex-row relative">
			<div class="flex-col flex-grow">
			<input type="hidden" name="post_type" value="product">
	   	    <input type="search" class="search-field mb-0" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo $placeholder; ?>" />
			</div>
			<div class="flex-col">
				<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0" aria-label="<?php esc_attr_e( 'Submit', 'flatsome' ); ?>">
					<span class="camera-icon"><i class="fa-light fa-magnifying-glass"></i></span>
				</button>
			</div>
		</div>
    <div class="live-search-results text-left z-top"></div>
</form>

