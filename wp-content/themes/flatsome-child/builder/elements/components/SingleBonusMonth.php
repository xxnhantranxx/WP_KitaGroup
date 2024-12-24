<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('SingleBonusMonth', array(
    'name'      => __('Single Bonus Month'),
    'type' => 'container',
    'category'  => __('FootBall'),
    'priority'  => 5,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => __('Tiêu đề'),
            'default' => '',
        ),
    ),
));