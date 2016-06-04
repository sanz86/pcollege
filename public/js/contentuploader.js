(function($) {
	
	// Initiate the Modals
	function initModal()
    {
		$("#title").val('');
        $("#message").text('');
        $("#file").val('');
        $("#id").val('');
	}
	
	// Initiate the Uploads
	function initFileUpload()
    {
        $(".progress").hide();
     	$('#successinfo').hide();
		$('.drop').show();
		$("#file").val('');
	}
	
	initModal();
	initFileUpload();
	
	$('#reset').click(function() {
		initFileUpload();
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
	
	var edit = $('.ec');
	
	edit.on('click',function(e){
			e.preventDefault();
              
              $("#contentForm").attr('action',edit_url);
              $("#actionTitle").text('Edit ');
              
              var obj = JSON.parse($(this).attr('data-value'));
              
              console.log(obj);
              
				$("#id").val(obj.id);
              $('input[name="title"]').val(obj.title);
              $("#message").text(obj.message);
              
              
              console.log('dd '+obj.url);
              if(obj.url != '')
              {
              	
              	$("#spansuccess").text(obj.url);
				$('.progress').hide();
				$('.drop').hide();
				$('#successinfo').show();
				$("#file").val(obj.url);
              }
              
              $("#addModal").modal('show');
     });
     
    $("#addbutton").on('click',function(e){
			e.preventDefault();
              
              initModal();
			initFileUpload();
              $("#contentForm").attr('action',add_url);
              $("#actionTitle").text('Add ');
              
              $("#addModal").modal('show');
     });
     
     
     $("#userImage").on('click',function(e) {
         alert('Nice');
     })
     
      $(".gallery").colorbox();
      
    $("#addStaffButton").on('click',function(e){
			e.preventDefault();
              
              initModal();
			initFileUpload();
              $("#contentStaffForm").attr('action',addStaff_url);
              $("#actionTitle").text('Add ');
              console.log('Hello');
              
              $("#addStaffModal").modal('show');
     });
     
     $('#changePasswordBtn').on('click',function(e){
     	
     	var pass1 = $('#new_password').val();
     	var pass2 = $('#re_new_password').val();
     	if(pass1 != pass2)
     	{
     		alert('Password not matching');
     		e.preventDefault();
     	}
     	
     });
     
})(jQuery);