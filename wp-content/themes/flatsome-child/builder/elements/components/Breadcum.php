<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/button.svg';
add_ux_builder_shortcode( 'Breadcum', array(
    'name'      => __('Breadcum'),
    'category'  => __('REVUELTO'),
    'priority'  => 87,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );