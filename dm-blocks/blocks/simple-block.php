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
function simple_block_block_init() {
	$dir = dirname( __FILE__ );

	$index_js = 'simple-block/index.js';
	wp_register_script(
		'simple-block-block-editor',
		plugins_url( $index_js, __FILE__ ),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		filemtime( "$dir/$index_js" )
	);

	$editor_css = 'simple-block/editor.css';
	wp_register_style(
		'simple-block-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(
			'wp-blocks',
		),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'simple-block/style.css';
	wp_register_style(
		'simple-block-block',
		plugins_url( $style_css, __FILE__ ),
		array(
			'wp-blocks',
		),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'dm-blocks/simple-block', array(
		'editor_script' => 'simple-block-block-editor',
		'editor_style'  => 'simple-block-block-editor',
		'style'         => 'simple-block-block',
	) );
}
add_action( 'init', 'simple_block_block_init' );
