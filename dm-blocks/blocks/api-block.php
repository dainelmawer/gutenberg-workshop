<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package dm-blocks
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type/#enqueuing-block-scripts
 */

 function render_api_block_data( $atts ) {

	 $recent = wp_get_recent_posts( array(
        'numberposts' => 1,
        'post_status' => 'publish',
     ) );

	if ( count( $recent ) === 0 ) {
        return 'No posts';
    }

	$post = $recent[ 0 ];
    $post_id = $post['ID'];

    return sprintf(
        '<a class="wp-block-dm-blocks-api-block" href="%1$s">%2$s</a>',
        esc_url( get_permalink( $post_id ) ),
        esc_html( get_the_title( $post_id ) )
    );

 }

function api_block_block_init()
{
    $dir = dirname(__FILE__);

    $index_js = 'api-block/index.js';
    wp_register_script(
        'api-block-block-editor',
        plugins_url($index_js, __FILE__),
        array(
            'wp-blocks',
            'wp-i18n',
            'wp-element',
        ),
        filemtime("$dir/$index_js")
    );

    $editor_css = 'api-block/editor.css';
    wp_register_style(
        'api-block-block-editor',
        plugins_url($editor_css, __FILE__),
        array(
            'wp-blocks',
        ),
        filemtime("$dir/$editor_css")
    );

    $style_css = 'api-block/style.css';
    wp_register_style(
        'api-block-block',
        plugins_url($style_css, __FILE__),
        array(
            'wp-blocks',
        ),
        filemtime("$dir/$style_css")
    );

    register_block_type('dm-blocks/api-block', array(
        'editor_script' 	=> 'api-block-block-editor',
        'editor_style'  	=> 'api-block-block-editor',
        'style'         	=> 'api-block-block',
		'render_callback'	=> 'render_api_block_data',
    ));
}

add_action('init', 'api_block_block_init');
