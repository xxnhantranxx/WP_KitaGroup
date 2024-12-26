<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'ItemRating', array(
    'name'      => __('Item Rating'),
    'category'  => __('REVUELTO'),
    'priority'  => 7,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_header' => array(
            'type'    => 'group',
	        'heading' => __( 'Cài đặt', 'flatsome' ),
            'options' => array(
                'number' => array(
                    'type' => 'textfield',
                    'heading' => 'Số',
                    'full_width' => true,
                ),
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề',
                    'full_width' => true,
                ),
            ),
        ),
    ),
) );