(function($) {
	
	$('.progress').hide();
	$('#successinfo').hide();
	
	$('#reset').click(function() {
		$('#successinfo').hide();
		$('.drop').show();
		$("#file").val('');
	});
	
//select the drop container
	var obj = $('.drop');

	// dragover event listener
	obj.on('dragover',function(e){
		e.stopPropagation();
		e.preventDefault();
		$(this).css('border',"2px solid #16a085");
	});

	//drop event listener
	obj.on('drop',function(e){
		e.stopPropagation();
		e.preventDefault();
		$(this).css('border',"2px dotted #bdc3c7");

		$("#spansuccess").text("");
		//capture the files
		var files = e.originalEvent.dataTransfer.files;
		
		var file = files[0];
		console.log(file);
		
		console.log(files[0].type);
		
		var formData = new FormData();
		
		formData.append( 'file', files[0] );
		formData.append('_token', token);
		//upload the file using xhr object
		upload(formData);

	});
	
	$('.drop').click(function() {
    	$('#modalFile').trigger('click');
	});
	
	$('#modalFile').change(function() {
    	
    	$("#spansuccess").text("");
        
        var myFile = $('#modalFile').prop('files')[0];
 
 		var formData = new FormData();
		
		formData.append( 'file', myFile );
		formData.append('_token', token);
		//upload the file using xhr object
		upload(formData);
	});
	
	function upload(formdata)
	{
		$('.drop').hide();
		$('.progress').show();
		
		var data = [];
		for (var i = 0; i < 100000; i++) {
		    var tmp = [];
		    for (var i = 0; i < 100000; i++) {
		        tmp[i] = 'hue';
		    }
		    data[i] = tmp;
		};
		
		$.ajax({
			
			xhr: function () {
		        var xhr = new window.XMLHttpRequest();
		        xhr.upload.addEventListener("progress", function (evt) {
		            if (evt.lengthComputable) {
		                var percentComplete = evt.loaded / evt.total;
		                console.log(percentComplete);
		                $('.progress-bar').css({
		                    width: percentComplete * 100 + '%'
		                });
		                if (percentComplete === 1) {
		                    $('.progress-bar').css({
		                    width: '100%'
		                });
		                }
		            }
		        }, false);
		        xhr.addEventListener("progress", function (evt) {
		            if (evt.lengthComputable) {
		                var percentComplete = evt.loaded / evt.total;
		                console.log(percentComplete);
		                $('.progress').css({
		                    width: percentComplete * 100 + '%'
		                });
		            }
		        }, false);
		        return xhr;
		    },
		    async: true,
		    type: "POST",
		    dataType: "json", // or html if you want...
		    contentType: false, // high importance!
		    url: upload_url, // you need change it.
		    data: formdata, // high importance!
		    processData: false, // high importance!
		    success: function (data) {
				$("#spansuccess").text(data['file']);
				$('.progress').hide();
				$('#successinfo').show();
				$("#file").val(data['file']);
		        console.log(data['file']);
		    },
		    error: function(xhr, textStatus, error){
			      console.log(xhr.statusText);
			      console.log(textStatus);
			      console.log(error);
			  }
		});
	}

})(jQuery);