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
        
      Route::get('/{content}',[
        'uses' => 'ContentController@getContent',
        'as' => 'content'
        ]);
        
    Route::post('/{content}/create',[
        'uses' => 'ContentController@postContent',
        'as' => 'content_create'
        ]);
        
     Route::get('/{content}/edit/{id}',[
        'uses' => 'ContentController@editContent',
        'as' => 'content_edit'
        ]);
        
     Route::get('/{content}/{id}/delete',[
        'uses' => 'ContentController@deleteContent',
        'as' => 'content_delete'
        ]);
    
    // End of News
    
});
