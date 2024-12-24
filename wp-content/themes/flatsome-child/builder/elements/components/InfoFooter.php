<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode( 'InfoFooter', array(
    'name'      => __('Info Footer'),
    'category'  => __('FootBall'),
    'priority'  => 97,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'hotline' => array(
            'type' => 'textfield',
            'heading' => 'Hotline',
            'full_width' => true,
        ),
        'email' => array(
            'type' => 'textfield',
            'heading' => 'Email',
            'full_width' => true,
        ),
        'address' => array(
            'type' => 'textfield',
            'heading' => 'Địa chỉ',
            'full_width' => true,
        ),
    ),
) );