<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Classes\Page;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function getIndex()
    {
        $pageDetails = new Page();
        $pageDetails->title = 'dashboard';
        
        return view('home',['pageDetails' => $pageDetails]);
    }
    
    public function getError()
    {
        $pageDetails = new Page();
        $pageDetails->title = 'error';
        
        return view('errors.404',['pageDetails' => $pageDetails]);
    }
    
}