<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'CardCodeSingle', array(
    'name'      => __('Card Code Single'),
    'category'  => __('FootBall'),
    'priority'  => 4,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_ganeral' => array(
            'type'    => 'group',
	        'heading' => __( 'Tổng quan', 'flatsome' ),
            'options' => array(
                'background' => array(
                    'type'     => 'colorpicker',
                    'heading'  => __( 'Màu Nền', 'flatsome' ),
                    'format'   => 'rgb',
                    'position' => 'bottom right',
                    'helpers'  => require( __DIR__ . '/../helpers/colors.php' ),
                ),
            ),
        ),
        'settings_left' => array(
            'type'    => 'group',
	        'heading' => __( 'Cột Trái', 'flatsome' ),
            'options' => array(
                'logo' => array(
                    'type' => 'image',
                    'heading' => __('Logo'),
                    'default' => ''
                ),
                'star_count' => array(
                    'type' => 'slider',
                    'heading' => __( 'Stars'),
                    'default' => 5,
                    'unit'    => 'count',
                    'max' => 5,
                    'min' => 0,
                ),
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tên',
                    'full_width' => true,
                ),
                'catch' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả',
                    'full_width' => true,
                ),
            ),
        ),
        'settings_right' => array(
            'type'    => 'group',
	        'heading' => __( 'Cột Phải', 'flatsome' ),
            'options' => array(
                'code' => array(
                    'type' => 'textfield',
                    'heading' => 'Mã',
                    'full_width' => true,
                ),
                'flag' => array(
                    'type' => 'image',
                    'heading' => __('Cờ'),
                    'default' => ''
                ),
                'tested' => array(
                    'type' => 'textarea',
                    'heading' => 'Kiểm tra',
                    'full_width' => true,
                ),
                'coupon' => array(
                    'type' => 'textarea',
                    'heading' => 'Áp dụng mã',
                    'full_width' => true,
                ),
                'description' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả mã',
                    'full_width' => true,
                ),
                'button' => array(
                    'type' => 'textfield',
                    'heading' => 'Nút',
                    'full_width' => true,
                ),
                'button_link' => array(
                    'type' => 'textfield',
                    'heading' => 'Link Nút',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );