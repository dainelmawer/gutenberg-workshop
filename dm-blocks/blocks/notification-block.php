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
function notification_block_block_init() {
	$dir = dirname( __FILE__ );

	$index_js = 'notification-block/index.js';
	wp_register_script(
		'notification-block-block-editor',
		plugins_url( $index_js, __FILE__ ),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		filemtime( "$dir/$index_js" )
	);

	$editor_css = 'notification-block/editor.css';
	wp_register_style(
		'notification-block-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(
			'wp-blocks',
		),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'notification-block/style.css';
	wp_register_style(
		'notification-block-block',
		plugins_url( $style_css, __FILE__ ),
		array(
			'wp-blocks',
		),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'dm-blocks/notification-block', array(
		'editor_script' => 'notification-block-block-editor',
		'editor_style'  => 'notification-block-block-editor',
		'style'         => 'notification-block-block',
	) );
}
add_action( 'init', 'notification_block_block_init' );
