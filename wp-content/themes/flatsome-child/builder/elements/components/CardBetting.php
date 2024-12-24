<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'CardBetting', array(
    'name'      => __('Card Betting'),
    'category'  => __('FootBall'),
    'priority'  => 2,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_header' => array(
            'type'    => 'group',
	        'heading' => __( 'Đầu thẻ', 'flatsome' ),
            'options' => array(
                'background' => array(
                    'type'     => 'colorpicker',
                    'heading'  => __( 'Background color', 'flatsome' ),
                    'format'   => 'rgb',
                    'position' => 'bottom right',
                    'helpers'  => require( __DIR__ . '/../helpers/colors.php' ),
                ),
                'number' => array(
                    'type' => 'textfield',
                    'heading' => 'Số',
                    'full_width' => true,
                ),
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
            ),
        ),
        'settings_body' => array(
            'type'    => 'group',
	        'heading' => __( 'Nội dung', 'flatsome' ),
            'options' => array(
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề',
                    'full_width' => true,
                ),
                'description' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả',
                    'full_width' => true,
                    'height'     => 'calc(100vh - 470px)',
                ),
            ),
        ),
        'settings_footer' => array(
            'type'    => 'group',
	        'heading' => __( 'Cuối thẻ', 'flatsome' ),
            'options' => array(
                'button_betnow' => array(
                    'type' => 'textfield',
                    'heading' => 'Link BetNow',
                    'full_width' => true,
                ),
                'button_more' => array(
                    'type' => 'textfield',
                    'heading' => 'Link BetNow',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );