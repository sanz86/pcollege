@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
 {{ ucfirst($pageDetails->description) }}
@endsection

@section('main-content')

@include('layouts.partials.modal')


						  <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">{{ ucfirst($pageDetails->description) }} Edit</h3>

             <form role="form" id="contentForm" method="post" action="{{ route('content_update', ['content' => $pageDetails->title]) }}">
             <div class="box-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ isset($contents->title)?$contents->title:'' }}">
              </div>
              <div class="form-group">
                <label for="message">Description</label>
                <textarea class="form-control" rows="3" id="message" name="message" placeholder="Enter Description Here">
                     {{ isset($contents->description)?$contents->description:'' }}
                    
                </textarea>
             
              </div>
          
                <div class="drop">Drop files here</div>	
                <div class="progress">
                    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                <div id="successinfo" class="alert alert-info">
                    File Uploaded: <span id="spansuccess">{{ isset($contents->file)?$contents->file:'' }}</span>
                    <span id="reset" class="label label-danger">Reset</span>
                  </div>
              </div>
        <!-- /.box-body -->
           <input type="hidden" name="_token" value="{{ Session::token() }}"/>
           <input type="hidden" name="id" value="{{ isset($contents->id)?$contents->id:'' }}"/>
           <input id="file" type="hidden" name="file" value="{{ isset($contents->file)?$contents->file:'' }}" />
           <input id="modalFile" type="file" />
           
            <button type="submit" class="btn btn-primary" form="contentForm">Save changes</button>
      
      </form>
        </div>
      </div>
            
          </div>
          
          <script>
              
              var oldFile = '{{ $contents->file }}';
              
              if(oldFile != '' )
              {
                $('.progress').hide();
	            $('#successinfo').hide();
	            $('#successinfo').show();
              }
              
          </script>


@endsection

