<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxVideoBanner', array(
    'name'      => __('Video Banner'),
    'category'  => __('REVUELTO'),
    'priority'  => 3,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'video_url' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn video',
            'full_width' => true,
        ),
        'button_options' => array(
            'type' => 'group',
            'heading' => __( 'Nút' ),
            'options' => array(
                'text' => array(
                    'type' => 'textarea',
                    'heading' => 'Nhãn nút',
                    'full_width' => true,
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
                    'full_width' => true,
                ),
            ),
        ),
        'content_options' => array(
            'type' => 'group',
            'heading' => __( 'Nội dung' ),
            'options' => array(
                'heading' => array(
                    'type' => 'textarea',
                    'heading' => 'Tiêu đề',
                    'full_width' => true,
                ),
                'desc' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả',
                    'full_width' => true,
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