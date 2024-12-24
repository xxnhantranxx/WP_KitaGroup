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
                'text' => array(
                    'type' => 'textarea',
                    'heading' => 'Văn bản',
                    'full_width' => true,
                ),
            ),
        ),
        'button_options' => array(
            'type' => 'group',
            'heading' => __( 'Nút' ),
            'options' => array(
                'label' => array(
                    'type' => 'textfield',
                    'heading' => 'Nút',
                    'full_width' => true,
                ),
                'link_button' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
                    'full_width' => true,
                ),
            ),
        ),
        'text_headding' => array(
                    'type' => 'textarea',
                    'heading' => 'Chữ dưới',
                    'full_width' => true,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );