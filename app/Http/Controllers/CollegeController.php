<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CollegeDepartment;
use App\CollegeCourse;
use App\Classes\Page;

class CollegeController extends Controller
{
    public function getDepartment()
    {
        $departments = CollegeDepartment::all();
        $courses = CollegeCourse::all();
        
        $pageDetails = new \stdClass();
        $pageDetails->title = 'department';
        $pageDetails->description = 'Department';
        
        return view('college.department',['departments' => $departments, 'courses' => $courses, 'pageDetails' => $pageDetails]);
        
    }
    
    public function postDepartment(Request $request)
    {
        $newDepartment = new CollegeDepartment();
        $newDepartment->client_id = app('client')['client_id'];
        $newDepartment->department_name = $request['departmentName'];
        $newDepartment->stream = $request['departmentStream'];
        
        $newDepartment->save();
        
        return redirect()->route('college::getDepartment');
    }
    
    public function deleteDepartment($id)
    {
        $newDepartment = CollegeDepartment::find($id);
        $newDepartment->delete();
        
        return redirect()->route('college::getDepartment');
    }
    
    public function getCourse()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'course';
        $pageDetails->description = 'Student Entry';
        
        return view('college.department',['pageDetails' => $pageDetails]);
    }
    
    public function postCourse(Request $request)
    {
        $newCourse = new CollegeCourse();
        $newCourse->client_id = app('client')['client_id'];
        $newCourse->course_name = $request['courseName'];
        $newCourse->description = $request['description'];
        
        $newCourse->save();
        
        return redirect()->route('college::getDepartment');
    }
    
    public function deleteCourse($id)
    {
        $newCourse = CollegeCourse::find($id);
        $newCourse->delete();
        
        return redirect()->route('college::getDepartment');
    }
    
    
    public function getCourseDetails()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'course';
        $pageDetails->description = 'Course Details';
        
        $courseDetail = [];
        
        $courseDetails = new \stdClass();
        $courseDetails->stream = 'Nice';
        $courseDetails->department_name = 'Nice';
        $courseDetails->course_name = 'Nice';
        $courseDetails->season = 'Nice';
        $courseDetails->semester = 'Nice';
        $courseDetails->year = 'Nice';
        $courseDetails->id = 1;
        
        $courseDetail[0] = $courseDetails;
        
        return view('college.course',['pageDetails' => $pageDetails,'courseDetails' => $courseDetail]);
    }
    
    public function postCourseDetails()
    {
        
    }
    
    public function deleteCourseDetails()
    {
        
    }
    
    public function addStudent()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'Student Entry';
        $pageDetails->description = 'Student Entry';
        
        return view('college.people',['pageDetails' => $pageDetails]);
    }
    
    public function getStudent()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'student';
        $pageDetails->description = 'Student Entry';
        
        return view('college.student',['pageDetails' => $pageDetails]);
    }
    
    
    public function getStaff()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'staff';
        $pageDetails->description = 'Staff Entry';
        
        return view('college.staff',['pageDetails' => $pageDetails]);
    }
}
