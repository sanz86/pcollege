
  <div class="modal" id="addStaffModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span id="actionTitle"></span>Add Staff</h4>
        </div>
        <div class="modal-body">
        <form role="form" id="contentStaffForm" method="post" >
         <div class="box-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="title" name="name" placeholder="Enter Name" required>
          </div>
          
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" id="title" name="designation" placeholder="Enter Desgination" required>
          </div>
          
          <div class="form-group">
            <label for="aboutme">About Me</label>
            <textarea class="form-control" rows="3" id="aboutme" name="aboutme" placeholder="Enter Text Here"></textarea>
          </div>
          
            <div class="drop">Drop Image here</div>	
            <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
              </div>
            <div id="successinfo" class="alert alert-info successinfo">
                File Uploaded: <span id="spansuccess"></span>
                <span id="reset" class="label label-danger">Reset</span>
              </div>
          </div>
        <!-- /.box-body -->
       <input type="hidden" name="_token" value="{{ Session::token() }}"/>
       <input id="file" type="hidden" name="file"/>
       <input id="id" type="hidden" name="id"/>
       <input id="modalFile" type="file" />
      
      </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="contentForm">Save changes</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  
  <script>

    var upload_url = "{{ route('upload_file') }}";
    var token = '{{ Session::token() }}';
    
    var addStaff_url = "{{ route('college::addStaff') }}";
    var edit_url = "{{ route('content_edit',['content' => $pageDetails->title]) }}";
  
  </script>
  
  