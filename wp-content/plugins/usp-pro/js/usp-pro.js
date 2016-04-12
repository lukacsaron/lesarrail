// USP Pro - JavaScript

jQuery(document).ready(function($) {
	// Add another image link : [usp_files multiple="" method=""]
	var x = parseInt($('#usp-file-limit').val());
	var n = parseInt($('#usp-file-count').val());
	if (x == 1) $('.usp-add-another').hide();
	$('.usp-add-another').click(function(event) {
		event.preventDefault();
		n++;
		var $this = $(this);
		var $new = $this.parent().find('input:visible:last').clone().val('');
		$('#usp-file-count').val(n);
		if (n < x) {
			$this.before($new.fadeIn(300));
		} else if (n = x) {
			$this.before($new.fadeIn(300));
			$this.hide();
		} else {
			$this.hide();
		}
	});
	// Preview selected images : [usp_files multiple="" method="select"]
	var inputLocalFont = document.getElementById("usp-multiple-files");
	if (inputLocalFont) inputLocalFont.addEventListener("change", previewImages, false);
	function previewImages() {
		$('.usp-preview').empty();
		var fileList = this.files;
		var anyWindow = window.URL || window.webkitURL;
		for (var i = 0; i < fileList.length; i++) {
			var j = i + 1;
			var objectUrl = anyWindow.createObjectURL(fileList[i]);
			$('.usp-preview').append('<div class="usp-preview-' + j + '"><a href="' + objectUrl + '" title="Preview of image #' + j + '" target="_blank"></a></div>');
			$('.usp-preview-' + j).css({ 'background-image' : 'url(' + objectUrl + ')', 'background-size' : 'cover', 'background-repeat' : 'no-repeat', 'background-position' : 'center center' });
			window.URL.revokeObjectURL(fileList[i]);
		}
	}
});


