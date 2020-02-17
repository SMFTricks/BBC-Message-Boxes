// Defines the formatting info that SCEditor uses to render a BBCode in the editor.
// See https://www.sceditor.com/documentation/custom-bbcodes for info.
sceditor.formats.bbcode.set(
	'error', {
		tags: {
			div: {
				class: 'error_bbc'
			}
		},
		// Called when toggling from WYSIWYG mode to source mode.
		format: function (element, content) {
			return '[error]' + content + '[/error]';
		},
		// Called when toggling from source mode to WYSIWYG mode.
		html: function (token, attrs, content) {
			return '<div class="error_bbc">' + content + '</div>';
		},
		// Other options
		allowsEmpty: true,
		isInline: false
	},
);
sceditor.formats.bbcode.set(
	'okay', {
		tags: {
			div: {
				class: 'okay_bbc'
			}
		},
		// Called when toggling from WYSIWYG mode to source mode.
		format: function (element, content) {
			return '[okay]' + content + '[/okay]';
		},
		// Called when toggling from source mode to WYSIWYG mode.
		html: function (token, attrs, content) {
			return '<div class="okay_bbc">' + content + '</div>';
		},
		// Other options
		allowsEmpty: true,
		isInline: false
	},
);
sceditor.formats.bbcode.set(
	'info', {
		tags: {
			div: {
				class: 'info_bbc'
			}
		},
		// Called when toggling from WYSIWYG mode to source mode.
		format: function (element, content) {
			return '[info]' + content + '[/info]';
		},
		// Called when toggling from source mode to WYSIWYG mode.
		html: function (token, attrs, content) {
			return '<div class="info_bbc">' + content + '</div>';
		},
		// Other options
		allowsEmpty: true,
		isInline: false
	},
);
sceditor.formats.bbcode.set(
	'warning', {
		tags: {
			div: {
				class: 'warning_bbc'
			}
		},
		// Called when toggling from WYSIWYG mode to source mode.
		format: function (element, content) {
			return '[warning]' + content + '[/warning]';
		},
		// Called when toggling from source mode to WYSIWYG mode.
		html: function (token, attrs, content) {
			return '<div class="warning_bbc">' + content + '</div>';
		},
		// Other options
		allowsEmpty: true,
		isInline: false
	},
);