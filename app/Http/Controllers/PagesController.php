<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;    

class PagesController extends Controller
{
    public function getIndex() {
    	$posts = Post::all();
    	return view('pages.welcome')->withPosts($posts);
    }

    public function getContact() {
    	return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required | email',
            'subject' => 'required',
            'body' => 'required | min:5 | max:500'
        ]);

        // $data = array(
        //     'email' = $request->email,
        //     'subject' = $request->subject,
        //     'message' = $request->message
        // );

        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');

        Mail::send('emails.contact', ['email'=>$email, 'subject'=>$subject, 'body'=>$body], function($message) {
            $message->to('mailtest@example.com');
        });

        Session::flash('success', 'Message sent. Thank you for contacting us.');

        return redirect()->route('welcome');
    }

    public function getAbout() {
    	return view('pages.about');
    }
}
