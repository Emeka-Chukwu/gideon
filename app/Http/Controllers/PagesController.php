<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use App\Event;
use App\Subscriber;
use Illuminate\Support\Facades\Mail;



class PagesController extends Controller
{
   public function index()
   {
    //    return view('pages.index');
        $categories = Category::all();
       $articles = Article::orderBy('created_at','desc')->paginate(10);
       return view('pages.index', compact('categories', 'articles'));
   }

   public function about()
   {
    $categories = Category::all();
       $articles = Article::orderBy('created_at','desc')->paginate(10);
       return view('pages.about', compact('categories', 'articles'));   
   }

 
   public function services()
   {
    $categories = Category::all();
    $articles = Article::orderBy('created_at','desc')->paginate(10);
    return view('pages.services', compact('categories', 'articles')); 
       
   }

   public function contact()
   {
    $categories = Category::all();
    $articles = Article::orderBy('created_at','desc')->paginate(10);
    return view('pages.contact', compact('categories', 'articles')); 
       
   }


   public function mailContact(Request $request)
   {
    $this->validate($request,[
        'email' => 'required|email',
        'subject' => 'required',
        'name' => 'required',
        'message' => 'required'    
    ]);
    $admins = User::where('is_admin','>','0')->all();
    $data = request()->all();
    // dd($data);
    // $m->to($user->email, $user->name)->subject('Your Reminder!');
    Mail::send('pages.emailContact', $data, function($message) use($data, $admins){
        $message->from($data['email'], $data['name']);
        $message->to();
        foreach($admins as $admin)
        {
            $message->to($admin->email, $admin->name)->subject($data['message']);
        }
        // dd($data)
        $admins;
    });
   }

   public function events()
   {
        $categories = Category::all();
       $articles = Article::orderBy('created_at','desc')->paginate(10);
       $events = Event::orderby('created_at','desc')->where('verified','>', '0')->paginate(10);
       return view('pages.events', compact('categories', 'articles','events')); 
   }
   


   public function subscribe(Request $request)
   {
       $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email',
       ]);
       $checkSubscribers = Subscriber::all();
       if(count($checkSubscribers)>0){
           foreach($checkSubscribers as $checkSubscriber){
               if($checkSubscriber->email == $request->input('email')){
                    return back()->with('error','Email already exist in the database');

               }
           }
       }
       $subscribe = new Subscriber;
       $subscribe->name = $request->input('name');
       $subscribe->email = $request->input('email');
       $subscribe->save();
       return back()->with('success','You have successfully subscribed to our daily manner');
   }



   public function SubscribersView()
   {
    $categories = Category::all();
    $articles = Article::orderBy('created_at','desc')->paginate(10);
    return view('emails.createsubscribersemail', compact('categories', 'articles')); 
       
   }
   

}
