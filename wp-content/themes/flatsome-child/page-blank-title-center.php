<?php
/**
 * Template name: Page - Container - Center Title
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header();
?>

<?php do_action( 'flatsome_before_page' ); ?>
<div class="top-heading">
	<header class="entry-header text-center">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="is-divider medium"></div>
	</header>
	<div class="avertissement small"><p style="font-size:14px;text-align: center;margin: 0;"><small class="advert" style="text-align:center;font-size: small !important;"><small>18+ | Commercial Content | T&amp;Cs apply | Begambleaware.org</small></small></p></div>
</div>
<div class="row page-wrapper">
	<div id="content" class="large-12 col" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>

			<?php endwhile; // end of the loop. ?>

	</div>
</div>

<?php echo do_shortcode('[block id="blogs"]'); ?>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
