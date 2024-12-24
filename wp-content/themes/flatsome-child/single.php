<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
	<?php
	if (is_single() && in_category('bonus-codes')) {
		// Nếu là một trang single và thuộc danh mục "bonus-codes"
		// Thực hiện các hành động bạn muốn ở đây
		the_content();
	} else {
		// Nếu không thuộc, bạn có thể thực hiện các hành động khác ở đây hoặc bỏ qua
		get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') );
	}
	?>
</div>

<?php get_footer();
