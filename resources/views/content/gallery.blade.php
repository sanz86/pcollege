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
              
              <div class="row">
                @for($i = 0; $i < count($contents); $i++)
                
                  <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                    <div class="small-box gallery-image">
                    <a class="gallery" href="{{ route('getFile',['image' => $contents[$i]->url]) }}">
                        <img class="img-thumbnail" src="{{ route('getFile',['image' => $contents[$i]->url]) }}" title="{{ $contents[$i]->title }}"></img>
                     </a> 
                      <div class="small-box-footer">
                        <a class="ec" href="" data-value="{{ json_encode($contents[$i]) }}"><i class="fa fa-edit"></i></a>
                         <a href="{{ route('content_delete',['content' => $pageDetails->title ,'id' => $contents[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                      </div>
                    </div>
                  </div>
                
                @endfor

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button id="addbutton" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
            
          </div>
          
@endsection

