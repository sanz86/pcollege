
  <div class="modal" id="pmModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ ucfirst($pageDetails->title) }}</h4>
        </div>
        <div class="modal-body">
        <form role="form" id="contentForm" method="post" action="{{ route('content_create', ['content' => $pageDetails->title]) }}">
         <div class="box-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label for="message">Description</label>
            <textarea class="form-control" rows="3" id="message" name="message" placeholder="Enter Description Here"></textarea>
         
          </div>
          <div class="form-group">
            <label for="inputFile">File input</label>
            <input type="file" id="inputFile" name="inputFile">

          </div>
        </div>
        <!-- /.box-body -->
       <input type="hidden" name="_token" value="{{ Session::token() }}"/>
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
  