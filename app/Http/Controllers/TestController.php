<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Image;

use App\Http\Requests;

class TestController extends Controller
{
    public function postFile(Request $request)
    {
        $file = $request->file('file');
        
        $filePart = explode('.',$file->getClientOriginalName());
        
        $fileName = $filePart[0].'_'.date('Ymdhis').'.'.$filePart[count($filePart)-1];
        
        $folder =  'testfiles/' ;
        
        $success = Storage::disk('local')->put($folder.$fileName, File::get($file));
        
        $thumb = Image::make($file)->resize(200,200);//->save($fileName);
        
        //print_r($file);
       // die();
        
        $successThumb = Storage::disk('local')->put('testfiles/thumb/'.$fileName, $thumb->stream());
    }
}
