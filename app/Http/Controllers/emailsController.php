<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;
use App\Mail\SubscribersEmail;
use App\Subscriber;



use Illuminate\Http\Request;

class emailsController extends Controller
{
    public function SendMailNow(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = request()->all();
        mail::to('emekapascal11@gmail.com')->send(new SendMail($data));
        return back()->with('success','Thanks for contacting us ');
    }

    public function SubscribersMessage(Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required',
            'title' => 'required',
        ]);
        $data =request()->all();
        $subscribers = Subscriber::all();
        foreach($subscribers as $subscriber)
        {
            mail::to($subscriber->email)->send(new SubscribersEmail($data));
        }
        return back()->with('success','Thanks for contacting us ');
    }


    public function SubscribersView()
    {
     $categories = Category::all();
     $articles = Article::orderBy('created_at','desc')->paginate(10);
     return view('emails.createsubscribersemail', compact('categories', 'articles')); 
        
    }
}
