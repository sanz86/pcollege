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
        <div class="col-md-12">
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
                  <th>Course</th>
                  <th>season</th>
                  <th>Semester</th>
                  <th>Year</th>
                  <th style="width: 40px">Action</th>
                </tr>
                
                @for($i = 0; $i < count($courseDetails); $i++)
                 
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $courseDetails[$i]->stream }}</td>
                  <td>
                    {{ $courseDetails[$i]->department_name }}
                  </td>
                  <td>
                    {{ $courseDetails[$i]->course_name }}
                  </td>
                  <td>
                    {{ $courseDetails[$i]->season }}
                  </td>
                  <td>
                    {{ $courseDetails[$i]->semester }}
                  </td>
                  <td>
                    {{ $courseDetails[$i]->year }}
                  </td>
                  <td>
                  
                  <a class="editDepartment" href="" data-value="{{ json_encode($courseDetails[$i]) }}"><i class="fa fa-edit"></i></a>
                   <a href="{{ route('college::deleteCourseDetails',['id' => $courseDetails[$i]->id]) }}"> <i class="fa fa-trash-o"></i></a>
                    
                  </td>
                </tr>
                
                @endfor
                
              </table>
              </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action={{ route('college::postCourseDetails') }} method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="department">Department</label>
                  <select class="form-control select2" style="width: 100%;" name="department"  id="department" >
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Others">Others</option>
                </select>
                  </div>
                  
                  <div class="form-group">
                  <label for="course">Department</label>
                  <select class="form-control select2" style="width: 100%;" name="course"  id="course" >
                  <option value="Science">Science</option>
                  <option value="Arts">Arts</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Others">Others</option>
                </select>
                  </div>
                  
                  <div class="form-group">
                  <label for="season">Season</label>
                  <input type="text" class="form-control" id="season" name="season" placeholder="Enter Season" required>
                </div>
                
                <div class="form-group">
                  <label for="Semester">Semester</label>
                  <input type="text" class="form-control" id="Semester" name="Semester" placeholder="Enter Semester" required>
                </div>
                
                <div class="form-group">
                  <label for="year">Year</label>
                  <input type="text" class="form-control" id="year" name="year" placeholder="Enter Year" required>
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
        
         <!-- /.box -->
        </div>
        
    </div>
          
@endsection

