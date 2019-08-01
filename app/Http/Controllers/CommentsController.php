<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
  

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        if(Auth::guest()){
            // return 'me';
            return redirect('/login')->with('error', 'Please Login to Comment');
        }
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
       
        $post = Article::find($request->get('article_id'));
    //    $post = $post->id;
    // return $request->all();
        // return $post = Article::find($request->get('articles_id'));
        // return $user;
       $post->comments()->save($comment);
    // return $request->all();

        return back();
    }


    public function replyStore(Request $request) 
    {
    //     $comment = new Comment;
    //     $comment->body = $request->get('comment_body');
    //     $comment->user()->associate($request->user());
    //     $post = Article::find(1);
    //     $reply->parent_id = $request->get('comment_id');
    // //    $post = $post->id;
    // // return $request->all();

    //     // return $post = Article::find($request->get('articles_id'));
    //     // return $user;
    //    $article->comments()->save($comment);
    // // return $request->all();

    //     return back();
    if(Auth::guest()){
        // return 'me';
        return redirect('/login')->with('error', 'Please Login to Comment');
    } else{

    

        $reply = new Comment();

        $reply->body = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        //  $emeka = $request->get('comment_name');
        $post = Article::find($request->get('article_id'));

        $post->comments()->save($reply);

        return back()->with('success', 'comment created');
    }
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
            'comment' => 'required'
        ]);

    
        $comment = Comment::find($id);
        $comment->body = $request->input('comment');
        dd($comment);
        $comment->save();
        return back()->with('success','Comment has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('success', 'the comment deleted successfully');
    }
}
