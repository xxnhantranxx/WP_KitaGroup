<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'ButtonVip', array(
    'name'      => __('Button Lac'),
    'category'  => __('FootBall'),
    'priority'  => 99,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_header' => array(
            'type'    => 'group',
	        'heading' => __( 'Cài đặt', 'flatsome' ),
            'options' => array(
                'label' => array(
                    'type' => 'textfield',
                    'heading' => 'Nhãn',
                    'full_width' => true,
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Dường dẫn',
                    'full_width' => true,
                ),
                'icon' => array(
                    'type' => 'image',
                    'heading' => 'Ảnh',
                    'full_width' => true,
                ),
                'class' => array(
                    'type' => 'textfield',
                    'heading' => 'Class',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );