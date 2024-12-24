<?php
/**
 * Account element.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.0
 */

if ( ! is_woocommerce_activated() ) {
	fl_header_element_error( 'woocommerce' );

	return;
}

$icon_style           = get_theme_mod( 'account_icon_style' );
$header_account_title = get_theme_mod( 'header_account_title', 1 );
$is_button            = $icon_style && $icon_style !== 'image' && $icon_style !== 'plain';
$li_atts              = [
	'class' => [ 'account-item', 'has-icon' ],
];

if ( is_account_page() ) $li_atts['class'][]   = 'active';
if ( is_user_logged_in() ) $li_atts['class'][] = 'has-dropdown';
?>

<li <?php echo flatsome_html_atts( $li_atts ); ?>>
<?php if ( $is_button ) echo '<div class="header-button">'; ?>
<?php
if ( is_user_logged_in() ) :
	$link_atts = [
		'href'       => esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ),
		'class'      => [ 'account-link', 'account-login' ],
		'title'      => esc_attr__( 'My account', 'woocommerce' ),
		'aria-label' => ! $header_account_title ? esc_attr__( 'My account', 'woocommerce' ) : null,
	];

	if ( $icon_style && $icon_style !== 'image' ) {
		$link_atts['class'][] = get_flatsome_icon_class( $icon_style, 'small' );
	}
	?>
	<a <?php echo flatsome_html_atts( $link_atts ); ?>>

		<?php
		if ( $icon_style == 'image' ) :
			echo '<i class="image-icon circle">' . get_avatar( get_current_user_id() ) . '</i>';
		elseif ( $icon_style ) :
			echo get_flatsome_icon( 'icon-user' );
		endif;
		?>

        <?php if ( get_theme_mod( 'header_account_title', 1 ) ) : ?>    
			<span class="header-account-title">
				<?php
				if ( get_theme_mod( 'header_account_username' ) ) :
					$wp_current_user = wp_get_current_user();
					echo esc_html( apply_filters( 'flatsome_header_account_username', $wp_current_user->display_name ) );
				else :
					esc_html_e( 'My account', 'woocommerce' );
				endif;
				?>
				</span>
		<?php endif; ?>
	</a>
	<?php
else : // Show login/register link.
	$link_atts = [
		'href'       => esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ),
		'class'      => [ 'nav-top-link', 'nav-top-not-logged-in', get_flatsome_icon_class( $icon_style, 'small' ) ],
		'title'      => esc_attr__( 'Login', 'woocommerce' ),
		'aria-label' => ! $header_account_title ? esc_attr__( 'Login', 'woocommerce' ) : null,
		'data-open'  => ( get_theme_mod( 'account_login_style', 'lightbox' ) == 'lightbox' && ! is_checkout() && ! is_account_page() ) ? '#login-form-popup' : null,
	];

	if ( $icon_style && $icon_style !== 'image' ) {
		$link_atts['class'][] = get_flatsome_icon_class( $icon_style, 'small' );
	}
	?>
    <i class="fa-solid fa-user"></i>
	<a <?php echo flatsome_html_atts( $link_atts ); ?>>
		<?php if ( get_theme_mod( 'header_account_title', 1 ) ) : ?>
			<span>
			<?php
			esc_html_e( 'Login', 'woocommerce' );
			if ( get_theme_mod( 'header_account_register' ) ) :
				echo ' / ' . esc_html__( 'Register', 'woocommerce' );
			endif;
			?>
			</span>
			<?php
		else :
			echo get_flatsome_icon( 'icon-user' );
		endif;
		?>
	</a>

<?php endif; ?>

<?php if ( $is_button ) echo '</div>'; ?>

<?php
// Show Dropdown for logged in users.
if ( is_user_logged_in() ) :
	?>
	<ul class="nav-dropdown <?php flatsome_dropdown_classes(); ?>">
		<?php wc_get_template( 'myaccount/account-links.php' ); ?>
	</ul>
<?php endif; ?>

</li>
