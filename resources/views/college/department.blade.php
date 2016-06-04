@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
 {{ ucfirst($pageDetails->description) }}
@endsection

@section('main-content')
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Department</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Stream</th>
                  <th>Department</th>
                  <th style="width: 40px">Action</th>
                </tr>
                
                @for($i = 0; $i < count($departments); $i++)
                 
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $departments[$i]->stream }}</td>
                  <td>
                    {{ $departments[$i]->department_name }}
                  </td>
                  <td>
                  
                  <a class="editDepartment" href="" data-value="{{ json_encode($departments[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('college::deleteDepartment',['id' => $departments[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                    
                  </td>
                </tr>
                
                @endfor
                
              </table>
              </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action={{ route('college::postDepartment') }} method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="departmentName">Department Name</label>
                  <input type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Enter Department Name" required>
                </div>
                <div class="form-group">
                  <label for="departmentStream">Stream</label>
                  <select class="form-control select2" style="width: 100%;" name="departmentStream"  id="departmentStream" >
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Others">Others</option>
                </select>
                  </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box -->
        </div> </div>
        
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Course</h3>
            </div>
             
             <div class="box-body">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Course</th>
                  <th>Description</th>
                  <th style="width: 40px">Action</th>
                </tr>
                
                @for($i = 0; $i < count($courses); $i++)
                 
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $courses[$i]->course_name }}</td>
                  <td>
                    {{ $courses[$i]->description }}
                  </td>
                  <td>
                  
                  <a class="editDepartment" href="" data-value="{{ json_encode($courses[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('college::deleteCourse',['id' => $courses[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                    
                  </td>
                </tr>
                
                @endfor
                
              </table>
              </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
           
            <!-- form start -->
            <form role="form"  action={{ route('college::postCourse') }} method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter Course Name" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        
    </div>
          
@endsection

