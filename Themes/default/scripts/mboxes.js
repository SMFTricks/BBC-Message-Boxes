// Defines the command info that SCEditor uses when the user clicks a BBCode's button.
// See https://www.sceditor.com/documentation/custom-commands for info.
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
);
sceditor.command.set(
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
);
sceditor.command.set(
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
);
sceditor.command.set(
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