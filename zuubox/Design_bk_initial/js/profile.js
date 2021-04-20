$(function(){
	var $videos = $('.profile .viewable_pic');

	var $modal = $('.profile .modal');
	var $modalPic = $modal.find('.pic_container');

	console.log($modal);

	$videos.on('click', function() {
		var $video = $(this);


		var thePic = $video.attr('src');
		var width = $video.prop('naturalWidth') || 'none';
		var height = $video.prop('naturalHeight') || 'none';

		$modalPic.css({
			'backgroundImage': 'url(' + thePic + ')',
			'maxWidth': width,
			'maxHeight': height
		});

		$modal.stop().fadeIn();
	});

	$modal.find('.close').click(function(){
		$modal.stop().fadeOut(function(){
			$modalPic.css('backgroundImage', '');
		});
	});

	$('img').load(function(){
		var $origImg = $(this);

		$("<img/>") // Make in memory copy of image to avoid css issues
	    .attr("src", $origImg.attr("src"))
	    .load(function() {
	        $origImg.prop('naturalWidth', this.width);   // Note: $(this).width() will not
	        $origImg.prop('naturalHeight', this.height);
	    });
	});

	// $videos.find('.video .name').eq(1).click();
});