<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/button.svg';
add_ux_builder_shortcode( 'ButtonWebsite', array(
    'name'      => __('Button Website'),
    'category'  => __('REVUELTO'),
    'priority'  => 1,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'text' => array(
            'type' => 'textfield',
            'heading' => 'Nhãn',
            'full_width' => true,
        ),
        'link' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn',
            'full_width' => true,
        ),
        'settings_options' => array(
            'type'    => 'group',
	        'heading' => __( 'Hướng dẫn', 'flatsome' ),
            'description' => 'Lấy mã icon tại <a target="blank" style="color:#9aa506" href="https://fontawesome.com/search?q=arrow%20up%20right&o=r">Fontawesome</a>. Và thay dấu nháy kép thành dấu nháy đơn!',
            'options' => array(
                'icon' => array(
                    'type' => 'textfield',
                    'heading' => 'Icon Code',
                    'full_width' => true,
                ),
            ),
        ),
        'blank' => array(
            'type' => 'checkbox',
            'heading' => __('Tab mới'),
            'default' => false,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );