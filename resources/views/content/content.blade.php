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

              <h3 class="box-title">contents</h3>
              
             
                {{ $app->client['description'] }}
              

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
                  <a href="{{ route('getFile',['image' => $contents[$i]->url]) }}" target="_blank">Down</a>
                  <div class="tools">
                   <a href="{{ route('content_edit',['content' => $pageDetails->title ,'id' => $contents[$i]->id]) }}"> <i class="fa fa-edit"></i></a>
                   <a href="{{ route('content_delete',['content' => $pageDetails->title ,'id' => $contents[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                  </div>
                </li>
                
                @endfor
               
              </ul>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"  data-toggle="modal" data-target="#pmModal"><i class="fa fa-plus"></i> Add item</button>
            </div>
            
          </div>


@endsection

