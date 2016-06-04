@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
 {{ ucfirst($pageDetails->description) }}
@endsection

@section('main-content')

@include('layouts.partials.contentmodal')


						  <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

              <div class="box-tools pull-right">
                <div class="pagination pagination-sm inline">
                   @if( $contents->currentPage() !== 1)
                    <a href="{{ $contents->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
                  @endif
                  
                  @if( $contents->currentPage() !== $contents->lastPage() && $contents->hasPages())
                      <a href="{{ $contents->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
                  @endif
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                
                @for($i = 0; $i < count($contents); $i++)
        
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>

                  <!-- todo text -->
                  <span class="text">{{ $contents[$i]->title }}</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i>{{ $contents[$i]->created_at }}</small>
                  <!-- General tools such as edit or delete-->
                  
                  @if($contents[$i]->url != '')
                  <a href="{{ route('getFile',['image' => $contents[$i]->url]) }}" target="_blank">Download File</a>
                  @endif
                  <div class="tools">
                   <a class="ec" href="" data-value="{{ json_encode($contents[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('content_delete',['content' => $pageDetails->title ,'id' => $contents[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                  </div>
                </li>
                
                @endfor
               
              </ul>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button id="addbutton" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
            
          </div>
          

@endsection

