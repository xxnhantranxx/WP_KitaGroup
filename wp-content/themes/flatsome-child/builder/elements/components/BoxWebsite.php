<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxWebsite', array(
    'type' => 'container',
    'name'      => __('Box Website'),
    'category'  => __('Edtexco'),
    'priority'  => 2,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __('Vị trí ảnh'),
            'default' => 'left',
            'options' => array(
                'left'  => array( 'title' => 'Trái'),
                'right'  => array( 'title' => 'Phải'),
            ),
        ),
        'img' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'is_image_auxiliary' => array(
            'type' => 'checkbox',
            'heading' => __('Ảnh Phụ'),
            'default' => false,
        ),
        'support' => array(
            'type' => 'group',
            'heading' => __( 'Ảnh phụ' ),
            'conditions' => 'is_image_auxiliary == "true"',
            'options' => array(
                'img_support' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
                    'default' => ''
                ),
                'position_x' => array(
                    'conditions' => 'img_support',
                    'type' => 'textfield',
                    'heading' => __('Position X'),
                ),
                'position_y' => array(
                    'conditions' => 'img_support',
                    'type' => 'textfield',
                    'heading' => __('Position Y'),
                ),
            ),
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );