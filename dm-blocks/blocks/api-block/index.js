(function(wp) {
	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var withAPIData = wp.components.withAPIData;

	registerBlockType('dm-blocks/api-block', {
		title: __('API Block'),
		category: 'widgets',
		supports: {
			html: false,
		},
		icon: 'update',

		edit: withAPIData( function() {
			return {
				posts: '/wp/v2/posts?per_page=1'
			};
		} )( function( props ) {

			/*
			* @see https://github.com/WordPress/gutenberg/issues/6537
			* Currently broken in v2.5
			*/

			if( ! props.posts.data ) {
				return "Loading...";
			}

			if ( props.posts.data.length === 0 ) {
            	return "Eish, no posts found...";
        	}

			return el(
				'a', {
					className: props.className,
					href: props.posts.data[0].link
				},
				props.posts.data[0].title.rendered
			);

		}),

		save: function( props ) {
			return null;
		}
	});
})(
	window.wp
);
