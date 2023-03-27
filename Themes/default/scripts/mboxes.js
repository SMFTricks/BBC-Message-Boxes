/**
 * @package BBC Message Boxes
 * @version 3.1
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2023, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

sceditor.command.set(
	'error', {
		// Called when editor is in WYSIWYG mode.
		exec: function(caller) {
			this.insert('[error]', '[/error]');
		},
		// Called when editor is in source mode.
		txtExec: function(caller) {
			this.insert('[error]', '[/error]');
		}
	}
).set(
	'okay', {
		// Called when editor is in WYSIWYG mode.
		exec: function(caller) {
			this.insert('[okay]', '[/okay]');
		},
		// Called when editor is in source mode.
		txtExec: function(caller) {
			this.insert('[okay]', '[/okay]');
		}
	}
).set(
	'info', {
		// Called when editor is in WYSIWYG mode.
		exec: function(caller) {
			this.insert('[info]', '[/info]');
		},
		// Called when editor is in source mode.
		txtExec: function(caller) {
			this.insert('[info]', '[/info]');
		}
	}
).set(
	'warning', {
		// Called when editor is in WYSIWYG mode.
		exec: function(caller) {
			this.insert('[warning]', '[/warning]');
		},
		// Called when editor is in source mode.
		txtExec: function(caller) {
			this.insert('[warning]', '[/warning]');
		}
	}
);