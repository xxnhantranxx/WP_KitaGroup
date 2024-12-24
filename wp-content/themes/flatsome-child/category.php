<?php get_header('transparent'); ?>
<div class="content-area" id="content" role="main">
    <?php echo do_shortcode('[block id="banner-blogs"]'); ?>
    <div class="row row-small row-list-category">
        <div class="col RemovePaddingBottom large-12">
            <ul class="list-category">
            <?php
                    // Lấy tất cả các danh mục và sắp xếp theo thứ tự trong quản trị
                    $args = array(
                        'taxonomy' => 'category',
                        'orderby' => 'term_order',
                        'order' => 'ASC',
                        'hide_empty' => false, // Hiển thị cả danh mục trống
                    );
                    $categories = get_terms($args);
                    $current_category = get_queried_object(); // Lấy đối tượng danh mục hiện tại

                    foreach ($categories as $category) {
                        $class = '';
                        if ($current_category && $current_category->term_id == $category->term_id) {
                            $class = 'active';
                        }
                        echo '<li class="' . $class . ' item-cate"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="row row-category">
        <div class="col RemovePaddingBottom small-12 large-6">
            <div class="col-inner">
                <div class="posts-list">
                    <?php
                        // Lấy số trang hiện tại
                        $count = 0;
                        // Lấy số trang hiện tại
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $posts_per_page_col1 = 3; // Số bài viết mỗi trang cho cột đầu tiên
                        $posts_per_page_col2 = 4; // Số bài viết mỗi trang cho cột thứ hai

                        // WP_Query cho cột đầu tiên
                        $args1 = array(
                            'posts_per_page' => $posts_per_page_col1,
                            'paged' => $paged,
                        );
                        $query1 = new WP_Query($args1);
                    ?>
                    <?php if ($query1->have_posts()) : ?>
                        <?php while ($query1->have_posts()) : $query1->the_post(); $class = ($count === 0) ? 'lead' : '';?>
                            <article id="post-<?php the_ID(); ?>" class="item-post <?php echo esc_attr($class); ?>">
                                <div class="article-inner box-post">
                                    <div class="box-text">
                                        <div class="first-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            }
                                            ?>
                                        </div>
                                        <div class="title-heading"><a class="textLine-2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="meta-date"><?php the_time('d/m/Y'); ?></div>
                                        <div class="exp-post"><?php the_excerpt(); ?></div>
                                        <div class="icon-more"><a href="<?php the_permalink(); ?>">Xem thêm <i class="fa-regular fa-arrow-right"></i></a></div>
                                    </div>
                                    <div class="box-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <?php
                                            if (get_the_post_thumbnail()) {
                                                echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'avatar'));
                                            } else {
                                                echo '<img src="' . home_url() . '/wp-content/uploads/2024/08/Rectangle-422.png" alt="Ảnh mặc định">';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php $count++; endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col RemovePaddingBottom small-12 large-6">
            <div class="col-inner">
                <div class="posts-list">
                    <?php
                        // Tính toán offset cho cột thứ hai
                        $offset = ($paged - 1) * ($posts_per_page_col1 + $posts_per_page_col2) + $posts_per_page_col1;

                        // WP_Query cho cột thứ hai
                        $args2 = array(
                            'posts_per_page' => $posts_per_page_col2,
                            'offset' => $offset,
                            'paged' => $paged,
                        );
                        $query2 = new WP_Query($args2);
                    ?>
                    <?php if ($query2->have_posts()) : ?>
                        <?php while ($query2->have_posts()) : $query2->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="item-post">
                                <div class="article-inner box-post">
                                    <div class="box-text">
                                        <div class="first-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            }
                                            ?>
                                        </div>
                                        <div class="title-heading"><a class="textLine-2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="meta-date"><?php the_time('d/m/Y'); ?></div>
                                        <div class="exp-post"><?php the_excerpt(); ?></div>
                                        <div class="icon-more"><a href="<?php the_permalink(); ?>">Xem thêm <i class="fa-regular fa-arrow-right"></i></a></div>
                                    </div>
                                    <div class="box-image">
                                        <a href="<?php the_permalink(); ?>" class="d-block">
                                            <?php
                                            if (get_the_post_thumbnail()) {
                                                echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'avatar'));
                                            } else {
                                                echo '<img src="' . home_url() . '/wp-content/uploads/2024/08/Rectangle-422.png" alt="Ảnh mặc định">';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-cntt">
        <?php
        // Sử dụng phân trang
        $pagination_args = array(
            'total' => max($query1->max_num_pages, $query2->max_num_pages),
            'current' => max(1, get_query_var('paged')),
        );
        flatsome_posts_pagination($pagination_args);
        ?>
    </div>
</div>
<?php get_footer(); ?>
