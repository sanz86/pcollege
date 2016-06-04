
  <div class="modal" id="changePasswordModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
        <form role="form" id="passwordChangeForm" method="post" action="{{ route('change_password') }}">
         <div class="box-body">
          <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required>
          </div>
          <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" required>
       
          </div>
          
          <div class="form-group">
            <label for="re_new_password">Confirm New Password</label>
            <input type="password" class="form-control" id="re_new_password" name="re_new_password" placeholder="Enter New Password Again" required>
       
          </div>
          
        <!-- /.box-body -->
       <input type="hidden" name="_token" value="{{ Session::token() }}"/>
      
      </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="changePasswordBtn" form="passwordChangeForm">Save changes</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
 
  
  