<?php

function projectloadmore_init() {
	$offset = !empty($_POST['offset']) ? intval( $_POST['offset'] ) : '';
	
	$args = array(
        'post_type' => 'project',
        'post_status' => array('publish'),
        'offset' => $offset,
        'posts_per_page' => 6,
        'order' => 'DESC',
        'orderby' => 'date',
        'sentence' => true,
    );
	
	
	$the_query = new WP_Query($args);

	?>
    <?php
	// The Loop
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
	  // Do Stuff
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
	die();
 	}
add_action( 'wp_ajax_projectloadmore', 'projectloadmore_init' );
add_action( 'wp_ajax_nopriv_projectloadmore', 'projectloadmore_init' );