function postRedirect(url, postData) {
	var $form = $('<form>').attr({action: url, method: 'post'});

	var $input;
	var value;
	for(var name in postData) {
		if(postData.hasOwnProperty(name)) {
			value = postData[name];
			$input = $('<input/>').attr('type', 'hidden').attr('name', name).val(value);
			$input.appendTo($form);
		}
	}

	$form.appendTo($('body')).submit();
}