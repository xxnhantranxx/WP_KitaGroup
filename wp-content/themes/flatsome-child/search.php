<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header('transparent'); 

// Kiểm tra tham số post_type trong URL
$post_type = isset($_GET['post_type']) ? $_GET['post_type'] : 'post';

if ($post_type === 'faq') {
    include( locate_template( 'search-faq.php' ) );
} else {?>
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
	    <?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_layout','right-sidebar') ); ?>
    </div>
<?php }
?>
<?php get_footer(); ?>
