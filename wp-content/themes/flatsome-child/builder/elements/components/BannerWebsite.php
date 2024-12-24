<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BannerWebsite', array(
    'type' => 'container',
    'name'      => __('Banner Website'),
    'category'  => __('REVUELTO'),
    'priority'  => 4,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'img' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'sub_image' => array(
            'type' => 'image',
            'heading' => __('Ảnh phụ'),
            'default' => ''
        ),
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __('Căn Chỉnh'),
            'default' => 'up',
            'options' => array(
                'up'  => array( 'title' => 'Trên'),
                'center'  => array( 'title' => 'Giữa'),
                'under' => array('title' => 'Dưới'),
            ),
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );