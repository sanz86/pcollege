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

Route::group(['middleware' => 'web'], function(){
    
    Route::get('/',[
        'uses' => 'HomeController@getIndex',
        'as' => 'dashboard'
        ]);
        
    Route::get('/you_got_an_error',[
        'uses' => 'HomeController@getError',
        'as' => '404error'
        ]);
        
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
        
    Route::get('/content/{content}/edit/{id}',[
        'uses' => 'ContentController@getEditContent',
        'as' => 'content_edit'
        ]);
        
     Route::get('/content/{content}/{id}/delete',[
        'uses' => 'ContentController@deleteContent',
        'as' => 'content_delete'
        ]);
        
    Route::get('/department',function(){
        $pageDetails = json_decode(json_encode(['title' => 'department']), FALSE);
        return view('people.department',['pageDetails' => $pageDetails]);
    })->name('department');
    
    // End of News
    

    
    Route::get('fileupload',function(){
       
      return view('fileupload');  
    })->name('fileupload');
    
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
        
        Route::get('file_content',function(){
            echo  file_get_contents("http://pcollege-sanz86.c9users.io/content/news");
            die();
        });
});
