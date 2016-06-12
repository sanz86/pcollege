
  <div class="modal" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span id="actionTitle"></span>{{ ucfirst($pageDetails->description) }}</h4>
        </div>
        <div class="modal-body">
        <form role="form" id="contentForm" method="post" >
         <div class="box-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
          </div>
          <div class="form-group">
            <label for="message">Description</label>
            <textarea class="form-control" rows="3" id="message" name="message" placeholder="Enter Description Here"></textarea>
         
          </div>
          
            <div id="contentDrop">
              <div class="drop">Click to select file or Drop file here</div>	
            </div>
          
            <div id="contentProgress">
              <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
              </div>
              <span class="progresssize"></span>
            </div>
            
            <div id="successinfo" class="alert alert-info">
                <span id="spansuccess"></span><br>
                <span id="contentReset" class="label label-danger">Reset</span>
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
    
    var drop_type = 'content';
    
    var add_url = "{{ route('content_create',['content' => $pageDetails->title]) }}";
    var edit_url = "{{ route('content_edit',['content' => $pageDetails->title]) }}";
  
  </script>
  
  