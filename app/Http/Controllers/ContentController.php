<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Page;
use App\Classes\Contents as Ct;

use App\Content;

use App\Http\Requests;

class ContentController extends Controller
{

    public function getContent($content)
    {
        $pageDetails = CT::getContents($content);
        
        if(!$pageDetails) return redirect()->route('404error');
        
       // print_r($pageDetails); die();
        
        $contents = Content::where('content_type',$pageDetails->content_type)->orderBy('created_at','desc')->paginate(6);

        return view('content',['pageDetails' => $pageDetails, 'contents' => $contents]);
    }
    
    public function postContent(Request $request, $content)
    {
        $this->validate($request,[
        'title' => 'required'
        ]);
        
        $pageDetails = CT::getContents($content);
        
        $newContent = new Content();
        
        $newContent->title = $request['title'];
        $newContent->message = $request['message'];
        $newContent->content_type = $pageDetails->content_type;
        
        $newContent->save();

        return redirect()->route('content',['content' => $content])->with(['success' => ucfirst($content).' added successfully!']);
    }
    
    public function editContent($content,$id)
    {
        $newContent = Content::where('id',$id)->first();
        
        // print_r($newContent);
        
        // die();
        
        $newContent->title = $newContent->title . ' Edited';
        
        $newContent->save();

        return redirect()->route('content',['content' => $content])->with(['success' => ucfirst($content).' updated successfully!']);
 
    }
    
    public function deleteContent($content,$id)
    {
        $newContent = Content::where('id',$id)->first();
        
        $newContent->delete();

        return redirect()->route('content',['content' => $content])->with(['success' => ucfirst($content).' deleted successfully!']);
 
    }
}
