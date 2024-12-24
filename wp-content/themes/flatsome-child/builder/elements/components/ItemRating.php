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
                'type_display' => array(
                    'type' => 'radio-buttons',
                    'heading' => __('Thể loại'),
                    'options' => array(
                        'is_count'  => array( 'title' => 'Là số'),
                        'is_image'  => array( 'title' => 'Là ảnh'),
                    ),
                    'default' => 'is_count',
                ),
                'count' => array(
                    'type' => 'slider',
                    'heading' => __( '.No'),
                    'default' => 1,
                    'unit'    => 'count',
                    'min' => 1,
                    'conditions' => 'type_display == "is_count"',
                ),
                'img' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
                    'default' => '',
                    'conditions' => 'type_display == "is_image"',
                ),
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề',
                    'full_width' => true,
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
                    'full_width' => true,
                    'conditions' => 'type_display == "is_image"'
                ),
                'desc' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả',
                    'full_width' => true,
                ),
                'reverse' => array(
                    'type' => 'checkbox',
                    'heading' => __('Đảo ngược'),
                    'default' => false,
                ),
            ),
        ),
    ),
) );