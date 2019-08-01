<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArticlesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Article::orderby('created_at','desc')->paginate(10)->where('verified_val', '0');
        // $collection = Person::all()->where('type', 'engineer')->lists('first_name');
        return view('adminarticles.index')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Article::find($id);
        return view('adminarticles.single')->with([
            'post' => $post
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
        $confirmpost = Article::find($id);
        $confirmpost->verified_val = 1;
        $confirmpost->save();
        return redirect('adminarticles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Article::find($id);
        

        if($post->image != 'noimage.jpg'){
            // delete image
           Storage::delete('public/cover_image/'.$post->cover_image);
        }
        $post->delete();
           return redirect('/adminarticles');
      
      


    }
}
