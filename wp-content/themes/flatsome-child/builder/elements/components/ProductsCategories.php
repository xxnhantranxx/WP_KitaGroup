<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('ProductsCategories', array(
    'type' => 'container',
    'name'      => __('Bộ sưu tập'),
    'category'  => __('Wander Print'),
    'priority'  => 1,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'cat' => array(
            'type' => 'select',
            'heading' => 'Category',
            'param_name' => 'cat',
            'full_width' => true,
            'default' => '',
            'config' => array(
                'multiple' => false,
                'placeholder' => 'Select...',
                'termSelect' => array(
                    'post_type' => 'product',
                    'taxonomies' => 'product_cat'
                ),
            )
        ),
        'offset' => array(
            'type' => 'slider',
            'heading' => 'Offset',
            'default' => 0,
            'unit'    => 'count',
            'max' => 20,
            'min' => 0,
        ),
        'cout' => array(
            'type' => 'slider',
            'heading' => 'Tổng',
            'default' => 6,
            'unit'    => 'count',
            'max' => 20,
            'min' => 0,
        ),
        'style' => array(
            'type' => 'radio-buttons',
            'heading' => __('Hiện nút'),
            'default' => 'nav',
            'options' => array(
                'nav'  => array( 'title' => 'Điều hướng'),
                'read'  => array( 'title' => 'Nút Xem Thêm'),
            ),
        ),
        'label' => array(
            'type' => 'textfield',
            'conditions' => 'style == "read"',
            'heading' => __( 'Nhãn' ),
            'default' => '',
        ),
        'link' => array(
            'type' => 'textfield',
            'conditions' => 'style == "read"',
            'heading' => __( 'Dường dẫn' ),
            'default' => '',
        ),
    )
));