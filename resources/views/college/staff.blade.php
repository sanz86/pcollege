@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
 {{ ucfirst($pageDetails->description) }}
@endsection

@section('main-content')

@include('layouts.partials.staffmodal')

          <div class="box box-primary">
                        <!-- /.box-header -->
            <div class="box-body">
                <table id="staffTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th  style="width: 200px">Image</th>
                  <th>Details</th>
                  <th style="width: 100px">Staff Category</th>
                  <th style="width: 40px">Action</th>
                </tr>
                </thead>
                
                <tbody>
                @if(count($staff) > 0)
                
                @for($i = 0; $i < count($staff); $i++)
                 
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>
                    @if($staff[$i]->image_url == '')
                    <img id="image" class="profile-user-img img-square" src="{{ route('getFile',['image' => 'index_20160606064352.jpg']) }}" alt="User profile picture">  
                    @else
                    <img id="image" class="profile-user-img img-square" src="{{ route('getFile',['image' => $staff[$i]->image_url]) }}" alt="User profile picture">  
                    @endif
                    
                  </td>
                  <td>
                    Name: {{ $staff[$i]->name }}<br>
                  Designation: {{ $staff[$i]->designation }}<br>
                  Qualification: {{ $staff[$i]->qualification }}<br>
                  Email: {{ $staff[$i]->qualification }}
                  @if($staff[$i]->bio_url != '')
                  <br>Biodata: <a href="{{ route('getFile',['image' => '']) }}" target="_blank">Download</a>
                  @endif
                  </td>
                  <td>
                    {{ $staff[$i]->staff_type }}
                  </td>
                  <td>
                  
                  <a class="editStaff" href="" data-value="{{ json_encode($staff[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('college::deleteStaff',['id' => $staff[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                    
                  </td>
                </tr>
                
                @endfor
                
                @endif
                </tbody>
              </table>
              </div>
            <!-- /.box-body -->
             <div class="box-footer clearfix no-border">
              <button id="addStaffbutton" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->
          
@endsection

