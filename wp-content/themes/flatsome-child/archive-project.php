<?php
get_header();?>
<div id="content" class="content-area content-archive-projects">
    <?php echo do_shortcode('[block id="banner-projects"]'); ?>
    <div class="container main-archive-projects">
        <div class="content-main-project">
            <div class="main-row-project">
                <?php 
                    $args = array(
                        'post_type' => 'project',
                        'post_status' => array('publish'),
                        'posts_per_page' => 6,
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $the_query = new WP_Query($args);
                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>
                <div class="BoxProject">
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
                    endwhile;
                    endif;
                    // Reset Post Data
                    wp_reset_postdata();
                ?>
            </div>
            <div class="main-row-project-loadding">
                <?php 
                for ($i=0; $i < 6; $i++) { ?>
                    <div class="item-post-project">
                        <div class="box-image-bage">
                            <div class="image-project-item">
                                <div class="image animate-loadding"></div>
                            </div>
                            <div class="text-project-item">
                                <a href="javascript:void(0);" class="title-project-item bg-bold animate-loadding"></a>
                                <a href="javascript:void(0);" class="btn-item-project bg-bold animate-loadding"></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="cta-project">
            <a href="javascrip:void(0)" target="_self" class="button primary is-outline uppercase btn-readmore-project">
                <span>See more</span>
                <i class="fa-regular fa-arrow-up-right"></i>
            </a>
        </div>
    </div>
    <?php echo do_shortcode('[block id="services-block"]'); ?>
    <?php echo do_shortcode('[block id="blocks-contacts"]'); ?>
    <script type="text/javascript">
		(function($){
			$(document).ready(function(){
			    offset = 6;
				$('.cta-project .btn-readmore-project').on('click', function(){
					$.ajax({
						type : "post",
						url : '<?php echo home_url(); ?>/wp-admin/admin-ajax.php',
						data : {
							action: "projectloadmore",
							offset: offset,
						},
						context: this,
						beforeSend: function(){
							jQuery('.main-row-project-loadding').addClass('show');
						},
                        success : function(data){
                            setTimeout(function(){
                                $('.main-row-project').append(data);
                                offset = offset + 6;
							    jQuery('.main-row-project-loadding').removeClass('show');
                            }, 300);  // The millis to wait before executing this block
                        },
						error: function( jqXHR, textStatus, errorThrown ){
							console.log( 'The following error occured: ' + textStatus, errorThrown );
						}
					})
					return false;
				})
			})
		})(jQuery)
    </script>
</div>
<?php get_footer();