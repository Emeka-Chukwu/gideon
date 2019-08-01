<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Category;
use App\Comment;
use App\Tag;
use Nicolaslopezj\Searchable\SearchableTrait;

class ArticlesController extends Controller
{
    use SearchableTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','search']]);
    }
    
    public function index()
    {
           // $posts = Post::orderBy('title','desc')->take(1)->get();
        // $articles = Article::all();


           $articles = Article::orderBy('created_at','desc')->where('verified_val', '1')->paginate(2);
        //    $articles->title = str_slug($articles->title);
           $comments = Comment::all();
           $categories = Category::all();
  
           return view('articles.index',compact('comments','articles','categories'));
       
    }

    public function search(Request $request)
    {
       
        $this->validate($request,[
            'search' => 'required',
        ]);
        // dd($search->toArray());


        // $query = $request->input('search');
        // $search = Article::search($query)->get();
        // dd($search);
        // $users = User::search($query)->get();

        // return $emeks = $request->input('search');
        // $searchs = Article::orderby('created_at','desc')->paginate(3);
        // $query = request('search');
        $query = $request->input('search');
        $searchs = Article::search($query)->paginate(4);
        $categories = Category::all();
        $articles = Article::orderby('created_at','desc')->paginate(10);
        return view('articles.search')->with([
                                            'searchs' => $searchs,
                                            'categories' => $categories,
                                            'articles' => $articles
                                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $articles = Article::orderby('created_at', 'desc')->paginate(10);
        $tags = Tag::all();

        return view('articles.create',['categories' => $categories, 'articles' => $articles, 'tags' => $tags
        ]);
        // return view('articles.create')->with('categories',$categories)->with('articles',$articles);
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
            'category' => 'required',
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'nullable|image|max:1999',
            'category' => 'required',
            'slug' => 'required'
        ]);
            
    //    $emeka = request()->all();
    //     $eme = $emeka['title'].'n/'.$emeka['body'] ; 
    //     dd($emeka);
              //  handle file upload


            // THIS RESIZES THE IMAGE 

            
              //image Storage
    //   if ($request->hasFile('featured_image')) {
    //     $image = $request->file('featured_image');
    //     $filename = time() .'.'.$image->getClientOriginalExtension();
    //     $location =  public_path('images/'.$filename);
    //     Image::make($image)->resize(1100,600)->save($location);

    //     $post->image = $filename;
    //   }



              if($request->hasFile('cover_image')){
                //   return true;
                // get filename with extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // just get filename 
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just the extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // filename to store #endregion
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                //upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);
           
            } else{
                $filenameToStore = 'noimage.jpg';
            }

            $article = new Article;
            $article->categories_id = $request->input('category');
            $article->title = $request->input('title');
            $article->user_id = auth()->user()->id;
            $article->body = $request->input('body');
            $article->verified_val = 0;
            $article->image = $filenameToStore;
            $article->urlnum = hexdec(uniqid());
            $article->slug = str_slug($request->input('slug'));
            $article->save();
            return $article->id;
            $article->tags()->sync($request->tags);

            return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlnum, $slug, $number)
    {
        $articleShow = Article::where([
            ['urlnum',$urlnum], ['slug',$slug]
            ])->first();
        $articleShow->title= str_slug($articleShow->title);
        $categories = Category::orderby('created_at','DESC')->get();
        
        $articles = Article::orderby('created_at','desc')->paginate(4);
        
        $posts = Article::orderby('created_at','desc')->paginate(10)->where('verified_val', '0');
        // $post = Post::where('slug', '=', $slug)->first();
        return view('articles.show',compact('categories', 'articleShow','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $articleEdit = Article::find($id);
        if(auth()->user()->id !== $articleEdit->user_id){
            return redirect('/articles')->with('error', 'Unauthorized Page');
        }
        $categories = Category::all();
        $articles = Article::orderby('created_at', 'desc')->paginate(2);

        // return view('articles.create')->with('categories',$categories);


        return view('articles.edit',compact('categories','articleEdit','articles'));
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
            'title' => 'required',
            'body' => 'required'
        ]);

        // $emeka = request()->all();
        // $eme = $emeka['title'].'n/'.$emeka['body'] ; 
        // dd($emeka);
        
        if($request->hasFile('cover_image')){
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // just get filename 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store #endregion
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);
       
        } 

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->categories_id = $request->input('category');
        if($request -> hasFile('cover_image')){
            $article->image = $filenameToStore;
        }

        $article->save();

        return redirect('/articles')->with('success', 'Article Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if(auth()->user()->id !== $article->user_id){
            return redirect('/articles')->with('error','Unauthorized Page');
        }
        
        if($article->image != 'noimage.jpg'){
            // delete image
            Storage::delete('public/image_cover/'.$article->image);
        }

        $article -> delete();
        // return redirect('/articles')->with('success','Post Removed');
        return 'deleted';
    }
}
 