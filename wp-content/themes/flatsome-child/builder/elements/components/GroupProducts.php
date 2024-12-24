<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_stack.svg';
add_ux_builder_shortcode( 'GroupProducts', array(
    'name'      => __('Group Products'),
    'category'  => __('Edtexco'),
    'priority'  => 3,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'product_1' => array(
            'type' => 'group',
            'heading' => __( 'Danh mục 1' ),
            'options' => array(
                'cat_1' => array(
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
            ),
        ),
        'product_2' => array(
            'type' => 'group',
            'heading' => __( 'Danh mục 2' ),
            'options' => array(
                'cat_2' => array(
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
            ),
        ),
        'product_3' => array(
            'type' => 'group',
            'heading' => __( 'Danh mục 3' ),
            'options' => array(
                'cat_3' => array(
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
            ),
        ),
        'product_4' => array(
            'type' => 'group',
            'heading' => __( 'Danh mục 4' ),
            'options' => array(
                'cat_4' => array(
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
            ),
        ),
        'product_5' => array(
            'type' => 'group',
            'heading' => __( 'Danh mục 5' ),
            'options' => array(
                'cat_5' => array(
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
            ),
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => __( 'Class' ),
            'default' => '',
        ),
    ),
) );