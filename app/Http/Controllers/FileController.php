<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileDetail;
use App\Classes\Contents as Ct;
use Storage;
use File;
use Image;

use App\Http\Requests;
use Illuminate\Http\Response;

class FileController extends Controller
{
    /**
     * Select file from Storage Facade
     * @param  string $fileName 
     * @return file           
     */
    public function getFile($fileName = null)
    {
        if(!$fileName) {
            return $this->getEmptyImage();
        }
        
        $file = FileDetail::where('file',$fileName)->first();
        
        if(Storage::disk('local')->has($file->folder.$fileName))
        {
            $fileT =  Storage::disk('local')->get($file->folder.$fileName);
            return (new Response($fileT, 200))
              ->header('Content-Type', $file->mime);
        }
        else
            return $this->getEmptyImage();
                
    }

    /**
     * post file to upload into storage
     * @param  Request $request 
     * @param  string  $folder  
     * @return JSON           
     */
    public function postFile(Request $request,$folder = null)
    {
        if($request->hasFile('file') == '')
        {
            if($request->ajax())
            {
                return response()->json([]);
            }
            else
               return back()->withInput();
        }
        
        $file = $request->file('file');
        
        $filePart = explode('.',$file->getClientOriginalName());
        
        $fileName = $filePart[0].'_'.date('Ymdhis').'.'.$filePart[count($filePart)-1];
        
        $folder = ($folder == null)? 'files/' : $folder;
        
        $success = Storage::disk('local')->put($folder.$fileName, File::get($file));
        
       $thumb = Image::make($file)->resize(150,150);
        
       $successThumb = Storage::disk('local')->put($folder.'thumb/'.$fileName, $thumb->stream());
        
        if($success)
        {
            $newFile = new FileDetail();
            
            $newFile->title = ($request->has('title') != '')?$request['title']:null;
            $newFile->description = ($request->has('description') != '')?$request['description']:null;
            $newFile->file_type = ($request->has('file_type') != '')?$request['file_type']:null;
            $newFile->mime = $file->getClientMimeType();
            
            $newFile->file = $fileName;
            $newFile->folder = $folder;
            
            $newFile->save();
            
            if($request->ajax())
            {
                return response()->json(['file' => $fileName]);
            }
            else
            return back()->withInput()->with(['success' => $fileName.' upload Successfully']);
        }
        
        if($request->ajax())
            {
                return response()->json([]);
            }
            else
               return back()->withInput();
    } 

    public function getImage($fileName = null)
    {
        if(!$fileName) {
            return $this->getEmptyImage();
        }
        
        $file = FileDetail::where('file',$fileName)->first();
        
        if(Storage::disk('local')->has($file->folder.$fileName))
        {
            $fileT =  Storage::disk('local')->get($file->folder.$fileName);
            return (new Response($fileT, 200))
              ->header('Content-Type', $file->mime);
        }
        else
            return $this->getEmptyImage();
                
    }

    public function postImage(Request $request,$folder = null)
    {
        if($request->hasFile('file') == '')
        {
            if($request->ajax())
            {
                return response()->json([]);
            }
            else
               return back()->withInput();
        }
        
        $file = $request->file('file');
        
        $filePart = explode('.',$file->getClientOriginalName());
        
        $fileName = $filePart[0].'_'.date('Ymdhis').'.'.$filePart[count($filePart)-1];
        
        $folder = ($folder == null)? 'files/' : $folder;
        
        $success = Storage::disk('local')->put($folder.$fileName, File::get($file));
        
       $thumb = Image::make($file)->resize(150,150);
        
       $successThumb = Storage::disk('local')->put($folder.'thumb/'.$fileName, $thumb->stream());
        
        if($success)
        {
            $newFile = new FileDetail();
            
            $newFile->title = ($request->has('title') != '')?$request['title']:null;
            $newFile->description = ($request->has('description') != '')?$request['description']:null;
            $newFile->file_type = ($request->has('file_type') != '')?$request['file_type']:null;
            $newFile->mime = $file->getClientMimeType();
            
            $newFile->newss = ($request->has('newss') != '')?$request['newss']:null;
            $newFile->description = ($request->has('description') != '')?$request['description']:null;
            $newFile->file_type = ($request->has('file_type') != '')?$request['file_type']:null;
            $newFile->mime = $file->getClientMimeType();
            

            $newFile->file = $fileName;
            $newFile->folder = $folder;
            
            $newFile->save();
            
            if($request->ajax())
            {
                return response()->json(['file' => $fileName]);
            }
            else
            return back()->withInput()->with(['success' => $fileName.' upload Successfully']);
        }
        
        if($request->ajax())
            {
                return response()->json([]);
            }
            else
               return back()->withInput();
    }  

    public function getImageThumb($fileName = null)
    {
        if(!$fileName) {
            return $this->getEmptyImage();
        }
        
        $file = FileDetail::where('file',$fileName)->first();
        
        if(Storage::disk('local')->has($file->folder.'thumb/'.$fileName))
        {
            $fileT =  Storage::disk('local')->get($file->folder.'thumb/'.$fileName);
            return (new Response($fileT, 200))
              ->header('Content-Type', $file->mime);
        }
        else
            return $this->getEmptyImage();
        		
    }

    protected function getEmptyImage()
    {
        $fileT = Storage::disk('local')->get('files/noimage.png');
        
        return (new Response($fileT, 200))
              ->header('Content-Type', 'image/png');
    }
    
    protected function getAvatar($image)
    {
        $fileT = Storage::disk('local')->get('avatar/'.$image);
        
        return (new Response($fileT, 200))
              ->header('Content-Type', 'image/jpg');
    }


    protected function postAvatar(Request $request)
    {
        $fileT = Storage::disk('local')->get('avatar/'.$image);
        
        return (new Response($fileT, 200))
              ->header('Content-Type', 'image/jpg');
    }
    
}
