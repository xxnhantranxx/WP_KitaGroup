<?php
// add_action('init', function () {
//     register_taxonomy('category-projects', array(
//         0 => 'project',
//     ), array(
//         'labels' => array(
//             'name' => 'Category Project',
//             'singular_name' => 'Category Project',
//             'menu_name' => 'Category Project',
//             'all_items' => 'All Category Project',
//             'edit_item' => 'Edit Category Project',
//             'view_item' => 'View Category Project',
//             'update_item' => 'Update Category Project',
//             'add_new_item' => 'Add New Category Project',
//             'new_item_name' => 'New Category Project Name',
//             'parent_item' => 'Parent Category Project',
//             'parent_item_colon' => 'Parent Category Project:',
//             'search_items' => 'Search Category Project',
//             'not_found' => 'No Category Project found',
//             'no_terms' => 'No Category Project',
//             'filter_by_item' => 'Filter by Category Project',
//             'items_list_navigation' => 'Category Project list navigation',
//             'items_list' => 'Category Project list',
//             'back_to_items' => '← Go to Category Project',
//             'item_link' => 'Category Project Link',
//             'item_link_description' => 'A link to a Category Project',
//         ),
//         'public' => true,
//         'hierarchical' => true,
//         'show_in_menu' => true,
//         'show_in_rest' => true,
//     ));
// });

// add_action('init', function () {
//     register_post_type('project', array(
//         'labels' => array(
//             'name' => 'Projects',
//             'singular_name' => 'Projects',
//             'menu_name' => 'Project',
//             'all_items' => 'All Project',
//             'edit_item' => 'Edit Project',
//             'view_item' => 'View Project',
//             'view_items' => 'View Project',
//             'add_new_item' => 'Add New Project',
//             'add_new' => 'Add New Projects',
//             'new_item' => 'New Project',
//             'parent_item_colon' => 'Parent Project:',
//             'search_items' => 'Search Project',
//             'not_found' => 'No Project found',
//             'not_found_in_trash' => 'No Project found in Trash',
//             'archives' => 'Project Archives',
//             'attributes' => 'Project Attributes',
//             'insert_into_item' => 'Insert into Project',
//             'uploaded_to_this_item' => 'Uploaded to this Project',
//             'filter_items_list' => 'Filter Project list',
//             'filter_by_date' => 'Filter Project by date',
//             'items_list_navigation' => 'Project list navigation',
//             'items_list' => 'Project list',
//             'item_published' => 'Project published.',
//             'item_published_privately' => 'Project published privately.',
//             'item_reverted_to_draft' => 'Project reverted to draft.',
//             'item_scheduled' => 'Project scheduled.',
//             'item_updated' => 'Project updated.',
//             'item_link' => 'Project Link',
//             'item_link_description' => 'A link to a Project.',
//         ),
//         'public' => true,
//         'show_in_rest' => true,
//         'supports' => array(
//             0 => 'title',
//             1 => 'editor',
//             2 => 'thumbnail',
//         ),
//         'taxonomies' => array(
//             0 => 'category-projects',
//         ),
//         'has_archive' => 'projects',
//         'rewrite' => array(
//             'feeds' => false,
//         ),
//         'delete_with_user' => false,
//     ));
// });


// function custom_posts_per_page($query)
// {
//     if (!is_admin() && $query->is_main_query() && is_post_type_archive('faq')) {
//         $query->set('posts_per_page', 6); // Số lượng bài viết trên mỗi trang, ở đây là 16
//     }
// }
// add_action('pre_get_posts', 'custom_posts_per_page');


add_action( 'init', function () {
    if ( function_exists( 'add_ux_builder_post_type' ) ) {
        add_ux_builder_post_type( 'product' );
    }
});