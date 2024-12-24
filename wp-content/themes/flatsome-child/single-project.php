<?php
get_header(); ?>
<div id="content" class="content-area content-single-projects">
    <section class="section section-single-projects">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row align-middle">
                <div class="col medium-12 small-12 large-12">
                    <div class="col-inner">
                        <div class="box-header-project">
                            <div class="left-content">
                                <div class="ButtonWebsite">
                                    <a class="button button-left-dot" href="javascript:void(0)">
                                        <span>About Projects</span>
                                    </a>
                                </div>
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_content(); ?></p>
                            </div>
                            <div class="right-image-box">
                                <div class="image-hard">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                                <div class="meta-text">
                                    <div class="inner-meta-text">
                                        <div class="item-meta-text">
                                            <div class="label">Location</div>
                                            <div class="value-meta"><?php the_field('location'); ?></div>
                                        </div>
                                        <div class="item-meta-text">
                                            <div class="label">Year</div>
                                            <div class="value-meta"><?php the_field('year'); ?></div>
                                        </div>
                                        <div class="item-meta-text">
                                            <div class="label">Area</div>
                                            <div class="value-meta"><?php the_field('area'); ?> <span>m<sup>2</sup></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-projects">
                            <div class="wrapper-gallery">
                                <?php
                                $images = get_field('collection_image');
                                if ($images): ?>
                                    <?php foreach ($images as $image): ?>
                                        <div class="item-gallery">
                                            <img src="<?php echo $image; ?>" />
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="box-image-projects">
                            <div class="text-blocks-prj">
                                <?php echo the_field('content_box'); ?>
                            </div>
                            <div class="image-prj">
                                <img src="<?php the_field('image_box'); ?>">
                            </div>
                        </div>
                        <div class="blocks_info">
                            <div class="inner-block-info">
                                <div class="item-colum-info item-service-info">
                                    <div class="label">Services</div>
                                    <div class="list-info">
                                        <?php
                                        if (have_rows('services_project')):
                                            while (have_rows('services_project')) : the_row();
                                                $name_service = get_sub_field('name_service'); ?>
                                                <div class="item-info"><?php echo $name_service; ?></div>
                                        <?php
                                            endwhile;
                                        // No value.
                                        else :
                                        // Do something...
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="item-colum-info item-design-info">
                                    <div class="label">Design Style</div>
                                    <div class="list-info">
                                        <?php
                                        if (have_rows('design_style')):
                                            while (have_rows('design_style')) : the_row();
                                                $design_name = get_sub_field('design_name'); ?>
                                                <div class="item-info"><?php echo $design_name; ?></div>
                                        <?php
                                            endwhile;
                                        // No value.
                                        else :
                                        // Do something...
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="item-colum-info item-status-info">
                                    <div class="label">​Status</div>
                                    <div class="list-info">
                                        <div class="item-info"><?php the_field('status'); ?></div>
                                    </div>
                                </div>
                                <div class="item-colum-info item-team-info">
                                    <div class="label">Team</div>
                                    <div class="list-info">
                                        <?php
                                        if (have_rows('team')):
                                            while (have_rows('team')) : the_row();
                                                $team_name = get_sub_field('team_name'); ?>
                                                <div class="item-info"><?php echo $team_name; ?></div>
                                        <?php
                                            endwhile;
                                        // No value.
                                        else :
                                        // Do something...
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo do_shortcode('[block id="review-projects"]'); ?>
    <section class="section other-project">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <!-- Content here -->
            <div class="row row-small other-project_r1">
                <div class="col large-12 medium-12 small-12 other-project_r1_c1 RemovePaddingBottom">
                    <div class="col-inner">
                        <!-- Content here -->
                        <h2>Other Projects</h2>
                        <p>Discover how we're pushing the boundaries of modern, eco-friendly design with our upcoming project.</p>
                    </div>
                </div>
            </div>
            <div class="row row-small other-project_r2">
                <div class="col large-12 medium-12 small-12 other-project_r2_c1 RemovePaddingBottom">
                    <div class="col-inner">
                        <div class="vipper-project">
                            <?php
                            $args = array(
                                'post_type' => 'project',
                                'post_status' => array('publish'),
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                                'orderby' => 'rand',
                            );
                            $the_query = new WP_Query($args);
                            $i = 1;
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                                    <div class="BoxProject col-position-<?php echo $i; ?>">
                                        <div class="box-image has-hover">
                                            <div class="image-zoom">
                                                <?php the_post_thumbnail('full'); ?>
                                                <div class="overlayImageProject"></div>
                                            </div>
                                            <div class="view-details">
                                                <a class="inner-view" href="<?php the_permalink(); ?>">
                                                    View Project
                                                </a>
                                            </div>
                                        </div>
                                        <div class="box-text">
                                            <div class="inner-text"><?php the_title(); ?></div>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                endwhile;
                            endif;
                            // Reset Post Data
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-small other-project_r3">
                <div class="col large-12 medium-12 small-12 other-project_r3_c1 RemovePaddingBottom">
                    <div class="col-inner">
                        <div class="ButtonWebsite">
                            <a class="button " href="<?php echo home_url(); ?>/projects/">
                                <span>Explore our work</span>
                                <i class="fa-regular fa-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo do_shortcode('[block id="blocks-contact"]'); ?>
</div>
<?php
get_footer();
