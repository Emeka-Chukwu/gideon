<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $articles = Article::orderby('created_at', 'desc')->limit(6);
        return view('categories.index',compact('categories', 'articles'));
        // return view('articles.show')->with('articles',$articles);
    }

    public function adminall()
    {
        $categories = Category::all();
       
        return view('categories.all',compact('categories'));
        // return view('articles.show')->with('articles',$articles);
    }

    // return view('articles.index',compact('comments','articles','categories'));
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required'
        ]);

        $category = new Category;
        $category->cat = $request->input('category');
        $category->save();

        return redirect('admin/categories/all')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function master($id)
    {
         return  $categories = Category::all();
        return view('Front.master')->with('catergories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,[
            'category' => 'required'
        ]);

        $category = Category::find($id);
        $category->cat = $request->input('category');
        $category->save();
        return redirect('admin/categories/all')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();
        return redirect('admin/categories/all')->with('success','are you deleting');
    }
}
