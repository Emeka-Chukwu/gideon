<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    if(Auth::guest()){
        return redirect('/login')->with('error','Unauthorized Operation');
    }
     $articles = Article::orderby('created_at','desc')->paginate(5);
     $categories = Category::orderby('created_at','desc')->paginate(5); 
     return view('events.create')->with([
         'articles' => $articles,
         'categories' => $categories,
     ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::guest()){
            return redirect('/login')->with('error','Unauthorized Page');
        }
        $this->validate($request,[
            'theme' => 'required',
            'time' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:999'

          

        ]);

        if($request->hasFile('image')){
            //   return true;
            // get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // just get filename 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // filename to store #endregion
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('image')->storeAs('public/event_image',$filenameToStore);
       
        } else{
            $filenameToStore = 'noimage.jpg';
        }
    
            $event = new Event;
            $event->user_id = auth()->user()->id;
            $event->theme = $request->input('theme');
            $event->venue = $request->input('venue');
            $event->time = $request->input('time');
            $event->description = $request->input('description');
            $event->verified = 0;
            $event->image = $filenameToStore;
            
            $event->save();
            return back()->with('success','Record inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $articles = Article::orderby('created_at','desc')->paginate(5);
        $categories = Category::orderby('created_at','desc')->paginate(5); 
        return view('events.show')->with([
            'event' => $event,
            'articles' => $articles,
            'categories' => $categories,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $articles = Article::orderby('created_at','desc')->paginate(5);
        $categories = Category::orderby('created_at','desc')->paginate(5); 

        if(auth()->user()->id != $event->user_id){
            return redirect('/');
        }
        return view('events.edit')->with([
            'event' => $event,
            'articles' => $articles,
            'categories' => $categories,
        ]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        
        if(Auth::guest()){
            return redirect('/login')->with('error','Unauthorized Page');
        }
        $this->validate($request,[
            'theme' => 'required',
            'time' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:999'
        ]);


        if($request->hasFile('image')){
            // get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // just get filename 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // filename to store #endregion
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('image')->storeAs('public/event_image',$filenameToStore);
       
        } 

        
        $event = Event::find($id);
        $event->theme = $request->input('theme');
        $event->venue = $request->input('venue');
        $event->time = $request->input('time');
        $event->description = $request->input('description');
        if($request->hasFile('image')){
            $event->image = $filenameToStore; 
        }
  
        $event->save();
        return redirect('/events/{{$id}')->with('success', 'Event Updated');
        
        }

     

        
        

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        
        if($event->image != 'noimage.jpg'){
            // delete image
           Storage::delete('public/event_image/'.$event->image);
        }
        $event->delete();
    }
}
