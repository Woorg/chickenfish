<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Hero block' ) )
            ->add_fields([
                Field::make( 'image', 'hero_image', __( 'Image' ) ),
                Field::make( 'text', 'hero_title', __( 'Title' ) ),
                Field::make( 'textarea', 'hero_text', __( 'Text' ) )
                    ->set_rows( 2 ),
                Field::make( 'text', 'hero_video', __( 'Video link' ) ),

            ])

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return get_block_template('hero', $arg);
            });

    });
