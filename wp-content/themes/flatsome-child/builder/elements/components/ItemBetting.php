<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'ItemBetting', array(
    'name'      => __('Item Betting'),
    'category'  => __('FootBall'),
    'priority'  => 3,
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
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tên',
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
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );