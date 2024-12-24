<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxProject', array(
    'type' => 'container',
    'name'      => __('Box Project'),
    'category'  => __('REVUELTO'),
    'priority'  => 2,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'img' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'text' => array(
            'type' => 'textarea',
            'heading' => 'Văn bản',
            'full_width' => true,
        ),
        'link' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn',
            'full_width' => true,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );