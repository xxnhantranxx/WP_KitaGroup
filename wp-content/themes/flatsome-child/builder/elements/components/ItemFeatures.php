<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'ItemFeatures', array(
    'name'      => __('Item Features'),
    'category'  => __('FootBall'),
    'priority'  => 6,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_header' => array(
            'type'    => 'group',
	        'heading' => __( 'Cài đặt', 'flatsome' ),
            'options' => array(
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tên',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );