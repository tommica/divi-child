window.et_fix_file_frame = function() {
	var state = wp.media.frames.et_pb_file_frame.state();
	var selectedMediaItem = state.get('selection').models[0];

	if ( ! _.isUndefined( selectedMediaItem ) ) {
		var display = state.display(selectedMediaItem).toJSON();
		var attachment = selectedMediaItem.toJSON();
		var imgurl = attachment.sizes[display.size].url;
		selectedMediaItem.set('url', imgurl);
	}
};

jQuery(function($) {
	var fixerName = 'js_fixedUploadOP';

	var custom_image_placer_fix = function() {
		var canRun = false;

		try{
			canRun = ("undefined" != typeof wp.media.frames.et_pb_file_frame);
		} catch(e) {}

		if(canRun && wp.media.frames.et_pb_file_frame[fixerName] != true) {
			wp.media.frames.et_pb_file_frame[fixerName] = true;

			$('.media-frame .media-button-insert').attr('onmousedown', 'window.et_fix_file_frame()');
		}
	}

	// Loop the fixer
	var looper = function() {
		custom_image_placer_fix();
		setTimeout(looper, 1000);
	}
	looper();
});