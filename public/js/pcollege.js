(function($) {
	
	// Image Uploader in content File
	
		// Initiate the Modals
			function initContentModal()
		    {
				$("#title").val('');
		        $("#message").text('');
		        $("#file").val('');
		        $("#id").val('');
			}
		
			// Initiate the Uploads
			function initContentFileUpload()
		    {
		        $("#contentProgress").hide();
		     	$('#successinfo').hide();
				$('#contentDrop').show();
				$("#file").val('');
		        $("#modalFile").val('');
			}
			
			initContentModal();
			initContentFileUpload();
			
			$('#contentReset').click(function() {
				initContentFileUpload();
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
				
				//capture the files
				var files = e.originalEvent.dataTransfer.files;
				
				var file = files[0];
				console.log(file);
				
				console.log(files[0].type);
				
				var formData = new FormData();
				
				formData.append( 'file', files[0] );
				formData.append('_token', token);
				//upload the file using xhr object
				
				var type = 'content';
				contentFileUpload(formData,type);
		
			});
			
			$('#contentDrop').click(function() {
		    	$('#modalFile').trigger('click');
			});
			
			$('#modalFile').change(function() {
		    	
		        var myFile = $('#modalFile').prop('files')[0];
		 
		 		var formData = new FormData();
				
				formData.append( 'file', myFile );
				formData.append('_token', token);
				//upload the file using xhr object
				var type = 'content';
				contentFileUpload(formData,type);
			});
			
			function contentFileUpload(formdata,type)
			{
					switch (type) {
							case 'content':
									$("#contentProgress").show();
									$('#contentDrop').hide();
									break;
										
							case 'staff_image':
									$("#staffProgress").show();	
								 	break;	
											
							case 'staff_bio':
									$("#staffProgressBio").show();
									break;
							default:
											// code
						}
				
				$.ajax({
					
					xhr: function () {
				        var xhr = new window.XMLHttpRequest();
				        xhr.upload.addEventListener("progress", function (evt) {
				            if (evt.lengthComputable) {
				                var percentComplete = evt.loaded / evt.total;
				                
				                var per = parseFloat((percentComplete * 100).toFixed(0));
									switch (type) {
										case 'content':
												$('.progress-bar').html(per + '%');
								                $('.progresssize').html(formatBytes(evt.loaded) +'/'+formatBytes(evt.total)+' '+' Complete');
								                
								                $('.progress-bar').css({
								                    width: percentComplete * 100 + '%'
								                });
								                
								                if (percentComplete === 1) {
								                    $('.progress-bar').css({
								                    width: '100%'
								                	});
								                }
											break;
										
										case 'staff_image':
												$('#staffProgressBar').html(per + '%');
								                $('#staffProgresssize').html(formatBytes(evt.loaded) +'/'+formatBytes(evt.total)+' '+' Complete');
								                
								                $('#staffProgressBar').css({
								                    width: percentComplete * 100 + '%'
								                });
							                
								                if (percentComplete === 1) {
								                    $('#staffProgressBar').css({
								                    width: '100%'
								                	});
								                }
											break;
										case 'staff_bio':
												$('#staffProgressBarBio').html(per + '%');
								                $('#staffProgresssizeBio').html(formatBytes(evt.loaded) +'/'+formatBytes(evt.total)+' '+' Complete');
								                
								                $('#staffProgressBarBio').css({
								                    width: percentComplete * 100 + '%'
								                });
							                
								                if (percentComplete === 1) {
								                    $('#staffProgressBarBio').css({
								                    width: '100%'
								                	});
								                }
											break;
										default:
											// code
									}
				            }
				        }, false);
				        xhr.addEventListener("progress", function (evt) {
				            if (evt.lengthComputable) {
				                var percentComplete = evt.loaded / evt.total;
				                switch (type) {
									case 'content':
											$('.progress').css({
							                    width: percentComplete * 100 + '%'
							                });
											break;
												
									case 'staff_image':
											$('#staffProgressBar').css({
							                    width: percentComplete * 100 + '%'
							                });	
										 	break;	
													
									case 'staff_bio':
											$('#staffProgressBarBio').css({
							                    width: percentComplete * 100 + '%'
							                });	
										 	break;
									default:
													// code
								}
				                   
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
				    		switch (type) {
							case 'content':
									if($.isEmptyObject(data))
							    	$("#spansuccess").text('Errors in uploading');
							    	else
									$("#spansuccess").text('File Uploaded: ' + data['file']);
									$('#contentProgress').hide();
									$('#successinfo').show();
									$("#file").val(data['file']);
							        console.log(data['file']);
									break;
										
							case 'staff_image':
									if(!$.isEmptyObject(data))
							    	{
										$("#staffImage").val(data['file']);
										$("#image").attr('src',image_url +'/'+ data['file']);
										console.log(image_url  +'/'+ data['file']);
										$("#staffProgress").hide();
										$("#staffImageFile").val('');
							    	}
								 	break;	
											
							case 'staff_bio':
									if(!$.isEmptyObject(data))
							    	{
										$("#staffBio").val(data['file']);
										$("#bio").html('<a href="'+image_url +'/'+ data['file']+'" target="_blank" >Download</a>');
										console.log(image_url  +'/'+ data['file']);
										$("#staffProgressBio").hide();
										$("#staffBioFile").val('');
							    	}
									break;
							default:
											// code
						}
				    	
				    },
				    error: function(xhr, textStatus, error){
					      console.log(xhr.statusText);
					      console.log(textStatus);
					      console.log(error);
					  }
				});
			}
			
			function formatBytes(bytes) {
			   if(bytes == 0) return '0 Byte';
			   var k = 1000; // or 1024 for binary
			   var dm = 2;
			   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
			   var i = Math.floor(Math.log(bytes) / Math.log(k));
			   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
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
						$("#contentProgress").hide();
				     	$('#successinfo').show();
						$('#contentDrop').hide();
						$("#file").val(obj.url);
		              }
		              
		              $("#addModal").modal('show');
		     });
		     
		    $("#addbutton").on('click',function(e){
					e.preventDefault();
		              
		              initContentModal();
					initContentFileUpload();
		              $("#contentForm").attr('action',add_url);
		              $("#actionTitle").text('Add ');
		              
		              $("#addModal").modal('show');
		     });
     
     // End of Image Uploader in content File
     
     // User Config
     
	     $("#userImage").on('click',function(e) {
	         alert('Nice');
	     })
	     
	     
	    // Change Password 
	    $('#changePasswordBtn').on('click',function(e){
     	
	     	var pass1 = $('#new_password').val();
	     	var pass2 = $('#re_new_password').val();
	     	if(pass1 != pass2)
	     	{
	     		alert('Password not matching');
	     		e.preventDefault();
	     	}
     	
    	});
    	
    	// End of Change Password
	     
	 //End of User Image Change
     
     // Gallery
     
    	$(".gallery").colorbox();
      
     // End of Gallery
     
     
     // Staff 
     
    $('#editStaffImage').click(function() {
		    	$('#staffImageFile').trigger('click');
			});
			
	$('#staffImageFile').change(function() {
	    	
	        var myFile = $('#staffImageFile').prop('files')[0];
	 
	 		var formData = new FormData();
			
			formData.append( 'file', myFile );
			formData.append('_token', token);
			//upload the file using xhr object
			
			var type = 'staff_image';
			contentFileUpload(formData,type);
		});
		
	$('#editStaffBio').click(function() {
		    	$('#staffBioFile').trigger('click');
			});
			
	$('#staffBioFile').change(function() {
	    	
	        var myFile = $('#staffBioFile').prop('files')[0];
	 
	 		var formData = new FormData();
			
			formData.append( 'file', myFile );
			formData.append('_token', token);
			//upload the file using xhr object
			var type = 'staff_bio';
			contentFileUpload(formData,type);
		});
		
	
     
     $('#staffTable').DataTable();
     
     
    	function initStaffModal()
	    {
			$("#name").val('');
	        $("#designation").text('');
	        $("#qualification").val('');
	        $("#email").val('');
	        $("#department").val('');
	        $("#staffProgress").hide();
	        $("#staffProgressBio").hide();
	        $("#staffImage").val('');
			$("#image").attr('src',image_url +'/index_20160606064352.jpg');
			console.log(image_url +'/blank_user_photo.jpg');
			$("#staffBio").val('');
			$("#bio").html('No Biodata available');
		}
      
	    $("#addStaffbutton").on('click',function(e){
				e.preventDefault();
	              
	              initStaffModal();
				
	              $("#staffForm").attr('action',add_Staff_url);
	              $("#actionTitle").text('Add ');
	              console.log('Hello');
	              
	              $("#addStaffModal").modal('show');
	     });
	     
	      $(".editStaff").on('click',function(e){
				e.preventDefault();
				
					initStaffModal();
				
	              $("#staffForm").attr('action',edit_Staff_url);
	              $("#actionTitle").text('Edit ');
	              
	              var obj = JSON.parse($(this).attr('data-value'));
	              
	              $("#id").val(obj.id);
	              if(obj.image_url != '')
	              {
	              	$("#staffImage").val(obj.image_url);
					$("#image").attr('src',image_url +'/'+ obj.image_url);
	              }
	              if(obj.bio_url != '')
	              {
	              	$("#staffBio").val(obj.bio_url);
					$("#bio").html('<a href="'+image_url +'/'+ obj.bio_url+'" target="_blank" >Download</a>');
	              }
	              
	              $("#id").val(obj.id);
	              $("#staffname").val(obj.name);
	              $("#staffdesignation").val(obj.designation);
	              $("#staffqualification").val(obj.qualification);
	              $("#staffemail").val(obj.email);
	              $("#staffCategory").val(obj.staff_type);
	              
	              $("#addStaffModal").modal('show');
	     });
	     
	     
    // End of Staff
    
    // Department Page
    
    	initDepartmentForm();
    	
    	$('#depTable').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });
	    
    	function initDepartmentForm()
    	{
    		$('#depName').val('');
    		$('#depDescription').val('');
    		$('#depStream').val('');
    		$('#depId').val('');
    		$("#depForm").attr('action',dep_add_url);
    		
    	}
    	
    	$('.depEdit').on('click', function(e){
    		e.preventDefault();
		              
              $("#depForm").attr('action',dep_edit_url);
              var obj = JSON.parse($(this).attr('data-value'));
              
              console.log(obj);
             
            $('#depName').val(obj.department_name);
    		$('#depDescription').val(obj.description);
    		$('#depStream').val(obj.stream);
    		$('#depId').val(obj.id);
		              
    	});
    	
    	$('#clearDep').on('click',function(e){
    		e.preventDefault();
    		initDepartmentForm();
    	});
    
    // End Of Department
    
    // Disappear Alert
	  $(".alert").delay(4000).slideUp(200, function() {
	    $(this).alert('close');
	});
     
})(jQuery);