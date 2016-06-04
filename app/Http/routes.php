<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web','auth']], function(){
    
    
    Route::post('password-reset',[
        'uses' => 'HomeController@resetPassword',
        'as' => 'change_password'
        ]);
    
    // Home controller
    
    Route::get('/',[
        'uses' => 'HomeController@index',
        'as' => 'dashboard'
        ]);
        
    Route::get('/you-got-an-error',[
        'uses' => 'HomeController@getError',
        'as' => '404error'
        ]);
        
    // End of Home Controller
    
    // Content Controller
        
    Route::get('/content/{content}',[
        'uses' => 'ContentController@getContent',
        'as' => 'content'
        ]);
        
    Route::post('/content/{content}/create',[
        'uses' => 'ContentController@postContent',
        'as' => 'content_create'
        ]);
        
    Route::post('/content/{content}/update/',[
        'uses' => 'ContentController@editContent',
        'as' => 'content_update'
        ]);
        
    Route::post('/content/{content}/edit/',[
        'uses' => 'ContentController@postEditContent',
        'as' => 'content_edit'
        ]);
        
    Route::get('/content/{content}/{id}/delete',[
        'uses' => 'ContentController@deleteContent',
        'as' => 'content_delete'
        ]);
        
    // End of Content Controller
        

    // Other Utility Routes
    
    Route::get('files/image/{image?}',[
        'uses' => 'FileController@getFile',
        'as' => 'getImage'
        ]);
        
    Route::get('files/getfile/{image?}',[
        'uses' => 'FileController@getFile',
        'as' => 'getFile'
        ]);
        
    Route::post('fileupload/post',[
        'uses' => 'FileController@postFile',
        'as' => 'upload_file'
        ]);
        
    // End of Other Utility Routes
    
    // College Routes
    
    Route::group(['prefix' => 'college','as' => 'college::'],function(){
        
        Route::get('/department',[
            'uses' => 'CollegeController@getDepartment',
            'as' => 'getDepartment'
            ]);
        
        Route::post('/department',[
            'uses' => 'CollegeController@postDepartment',
            'as' => 'postDepartment'
            ]);
            
        Route::get('/department/{id}/delete',[
            'uses' => 'CollegeController@deleteDepartment',
            'as' => 'deleteDepartment'
            ]);
        
        Route::get('/course',[
            'uses' => 'CollegeController@getCourse',
            'as' => 'getCourse'
            ]);
        
        Route::post('/course',[
            'uses' => 'CollegeController@postCourse',
            'as' => 'postCourse'
            ]);
            
        Route::post('/course/{id}/delete',[
            'uses' => 'CollegeController@deleteCourse',
            'as' => 'deleteCourse'
            ]);
            
        Route::get('/course-details',[
            'uses' => 'CollegeController@getCourseDetails',
            'as' => 'getCourseDetails'
            ]);
            
        Route::post('/course-details',[
            'uses' => 'CollegeController@postCourseDetails',
            'as' => 'postCourseDetails'
            ]);
        Route::get('/course-details/{id}/delete',[
            'uses' => 'CollegeController@deleteCourseDetails',
            'as' => 'deleteCourseDetails'
            ]);
            
        // --------------------
         
        // Student Routes 
            
        Route::get('/student',[
            'uses' => 'CollegeController@getStudent',
            'as' => 'getStudent'
            ]);
            
        Route::post('/student',[
            'uses' => 'CollegeController@addStudent',
            'as' => 'addStudent'
            ]);
            
        Route::get('/staff',[
            'uses' => 'CollegeController@getStaff',
            'as' => 'getStaff'
            ]);
            
        Route::post('/staff',[
            'uses' => 'CollegeController@addStaff',
            'as' => 'addStaff'
            ]);
    });
    // End of College
    
    //
    
    // Testing
    Route::get('/hello',function(){
        return response()->json(['name'=>'sanjib']);
    });
});
