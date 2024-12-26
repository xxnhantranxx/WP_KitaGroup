<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/play.svg';
add_ux_builder_shortcode( 'VideoWebsite', array(
    'name'      => __('Video Website'),
    'category'  => __('REVUELTO'),
    'priority'  => 1,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'video_options' => array(
            'type' => 'group',
            'heading' => __( 'Video' ),
            'options' => array(
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
                    'full_width' => true,
                ),
                'img' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
                    'default' => ''
                ),
            ),
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );