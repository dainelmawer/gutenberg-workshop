(function(wp) {

	var registerBlockType = wp.blocks.registerBlockType;
	var Editable = wp.blocks.RichText;
	var AlignmentToolbar = wp.blocks.AlignmentToolbar;
	var BlockControls = wp.blocks.BlockControls;
	var InspectorControls = wp.blocks.InspectorControls;
	var ToggleControl = wp.components.ToggleControl;
	var SelectControl = wp.components.SelectControl;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;

	console.log(InspectorControls);
	console.log(ToggleControl);
	console.log(SelectControl);

	registerBlockType('dm-blocks/notification-block', {

		title: __('Notification Block'),
		category: 'widgets',
		icon: 'format-status',
		supports: {
			html: false,
		},

		attributes: {
			content: {
				type: 'string',
				default: 'Editable block content...',
			},
			alignment: {
				type: 'string',
			},
			alertType: {
				type: 'string'
			}
		},

		edit: function(props) {

			var content = props.attributes.content;
			var alignment = props.attributes.alignment;
			var focus = props.focus;

			var controls = [
				el(
					InspectorControls, {},
					el(
						SelectControl, {
							label: __('Change Alert Type'),
							help: __('Allows you to choose a class to style the alert'),
							onChange: onChangeSelect,
							options: [{
									value: 'default',
									label: 'Default'
								},
								{
									value: 'success',
									label: 'Success'
								},
								{
									value: 'danger',
									label: 'Danger'
								},
								{
									value: 'warning',
									label: 'Warning'
								},
							],
						}
					),
				),
			];

			function onChangeContent(updatedContent) {
				props.setAttributes({
					content: updatedContent
				});
			}

			function onChangeAlignment(newAlignment) {
				props.setAttributes({
					alignment: newAlignment
				});
			}

			function onChangeSelect( newAlertType ) {
				props.setAttributes({
					alertType: newAlertType
				})
			}

			return [
				controls,
				el(
					BlockControls, {
						key: 'controls'
					},
					el(
						AlignmentToolbar, {
							value: alignment,
							onChange: onChangeAlignment
						}
					)
				),

				el(
					Editable, {
						tagName: 'p',
						className: props.className + ' ' + props.attributes.alertType,
						value: content,
						onChange: onChangeContent,
						style: {
							textAlign: alignment
						},
						focus: focus,
						onFocus: props.setFocus
					}
				)

			];

		},

		save: function(props) {

			var content = props.attributes.content;
			var alignment = props.attributes.alignment;
			var alertType = props.attributes.alertType;

			return el(
				'p', {
					className: props.className + ' ' + alertType,
					style: {
						textAlign: alignment
					},
				},
				content
			);

		}
	});
})(
	window.wp
);
