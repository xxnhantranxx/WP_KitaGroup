<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'Rating', array(
    'name'      => __('Rating'),
    'type' => 'container',
    'allow' => array( 'ItemRating'),
    'category'  => __('FootBall'),
    'priority'  => 8,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'wrap'   => true,
    'inline' => true,
    'options' => array(
        'settings_header' => array(
            'type'    => 'group',
	        'heading' => __( 'Cài đặt', 'flatsome' ),
            'options' => array(
                'class' => array(
                    'type' => 'textfield',
                    'heading' => 'Class',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );