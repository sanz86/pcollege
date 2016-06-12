
  <div class="modal" id="addStaffModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span id="actionTitle"></span> Staff</h4>
        </div>
        
        <div class="modal-body">
          
      <div class="row">    
      <form role="form" id="staffForm" method="post" >
        <div class="col-md-6">
            <div class="box-body box-profile">
              
              <div id="staffShowImages" class="centered">
                <img id="image" class="profile-user-img img-square" alt="User profile picture">
  
                <p><span id="editStaffImage" class="btn btn-block btn-primary btn-flat"><i class="fa fa-edit"></i>Edit</span></p>
              </div>
              <input id="staffImageFile" type="file" />
              <input id="staffImage" name="image" type="hidden" />
              <div id="staffProgress">
                <div class="progress">
                      <div id="staffProgressBar" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% Complete (success)</span>
                      </div>
                      
                </div>
                <span id="staffProgresssize"></span>
              </div>
              <!-- /.box-body -->
            
                <div class="form-group">
                  <label for="name">Biodata:</label><br>
                  <span id="bio">No Bio Data</span>
                </div>
              <p><span id="editStaffBio" class="btn btn-block btn-primary btn-flat"><i class="fa fa-edit"></i> Upload</span></p>
                 <input id="staffBioFile" type="file" />
                <input id="staffBio" name="bio" type="hidden" />
               <div id="staffProgressBio"> 
                <div class="progress">
                    <div  id="staffProgressBarBio" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
                
                <span id="staffProgresssizeBio"></span>
                </div>
                
              </div>
  
          </div>
          
          <div class="col-md-6">
  
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="staffname" name="name" placeholder="Enter Name" required>
            </div>
            
            <div class="form-group">
              <label for="designation">Designation</label>
              <input type="text" class="form-control" id="staffdesignation" name="designation" placeholder="Enter Desgination" required>
            </div>
            
            <div class="form-group">
              <label for="qualification">Qualification</label>
              <input type="text" class="form-control" id="staffqualification" name="qualification" placeholder="Enter Qualification"></textarea>
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="staffemail" name="email" placeholder="Enter Email Id"></textarea>
            </div>
            
            <div class="form-group">
              <label for="staffCategory">Staff Category</label>
              <select class="form-control select2" style="width: 100%;" name="staffCategory"  id="staffCategory" >
                  <option value="Faculty">Faculty</option>
                  <option value="Non Teaching">Non Teaching</option>
                </select>
              
            </div>
           
        
          
          </div>
          
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
           <input id="id" type="hidden" name="id"/>
          
          </form>
          </div>
        </div>
         
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="staffForm">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  
  <script>

    var upload_url = "{{ route('upload_file') }}";
    var token = '{{ Session::token() }}';
    
    var add_Staff_url = "{{ route('college::addStaff') }}";
    var edit_Staff_url = "{{ route('college::editStaff') }}";
    var image_url = "{{ route('getFile',['image'=>'']) }}"
  
  </script>
  
  