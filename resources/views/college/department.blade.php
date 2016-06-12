@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
 {{ ucfirst($pageDetails->description) }}
@endsection

@section('main-content')

 <!-- general form elements -->
    <div class="box box-primary">
                  <!-- /.box-header -->
      <div class="box-body">
              <table id="depTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Stream</th>
                  <th>Department</th>
                  <th>Description</th>
                  <th style="width: 40px">Action</th>
                </tr>
                </thead>
                
                <tbody>
                @for($i = 0; $i < count($departments); $i++)
                 
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $departments[$i]->stream }}</td>
                  <td>
                    {{ $departments[$i]->department_name }}
                  </td>
                  <td>
                    {{ $departments[$i]->description }}
                  </td>
                  <td>
                  
                  <a class="depEdit" href="" data-value="{{ json_encode($departments[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('college::deleteDepartment',['id' => $departments[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                    
                  </td>
                </tr>
                
                @endfor
                </tbody>
              </table>
              </div>
            <!-- /.box-body -->
      <div class="box-footer clearfix">
        
        <div class="row">      
        <div class="col-md-6">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" id="depForm">
              <div class="box-body">
                <div class="form-group">
                  <label for="depName">Department Name</label>
                  <input type="text" class="form-control" id="depName" name="depName" placeholder="Enter Department Name" required>
                </div>
                
                <div class="form-group">
                  <label for="depDescription">Description</label>
                  <textarea class="form-control" rows="3" id="depDescription" name="depDescription" placeholder="Enter Description Here"></textarea>
               
                </div>
                
                <div class="form-group">
                  <label for="depStream">Stream</label>
                  <select class="form-control select2" style="width: 100%;" name="depStream"  id="depStream" >
                  <option value="">Please select Stream</option>
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Others">Others</option>
                </select>
                  </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                <input type="hidden" name="depId" id="depId" />
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" id="clearDep" class="btn btn-primary pull-right" >Clear</button>
              </div>
            </form>
        </div>
        </div>
      </div>
          <!-- /.box -->
  </div> 
      
      <script>
        
        var dep_add_url = "{{ route('college::postDepartment')  }}";
        var dep_edit_url = "{{ route('college::editDepartment')  }}";
        
      </script>
        
@endsection


