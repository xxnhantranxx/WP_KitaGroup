<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('ItemBannerSection', array(
    'name'      => __('Item Banner'),
    'category'  => __('FootBall'),
    'priority'  => 1,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'icon' => array(
            'type' => 'textfield',
            'heading' => __('Icon'),
            'default' => '',
            'description' => 'Icon lấy từ https://fontawesome.com/'
        ),
        'text_title' => array(
            'type' => 'textarea',
            'heading' => 'Tiêu đề',
            'full_width' => true,
            'height'     => 'calc(100vh - 470px)',
        ),
        'text_link' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn',
            'full_width' => true,
        ),
    ),
));