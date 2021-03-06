<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Features block' ) )
            ->add_fields([
                Field::make( 'text', 'feature_title', __( 'Title' ) ),
                Field::make( 'image', 'feature_image', __( 'Image' ) ),
                Field::make( 'text', 'feature_video', __( 'Video link' ) ),
                Field::make( 'complex', 'features' )
                    ->add_fields( 'features_list', array(
                        Field::make( 'text', 'feature_item_title', __( 'Title' ) ),
                        Field::make( 'textarea', 'feature_item_text', __( 'Text' ) )
                            ->set_rows( 2 )
                    ) )

            ])

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return get_block_template('features', $arg);
            });

    });
