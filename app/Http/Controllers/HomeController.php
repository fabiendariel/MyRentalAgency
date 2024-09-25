<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Mail\Mailer;

class HomeController extends Controller
{
    public function index () {
        $properties = Property::recent()->available()->limit(3)->get();
        return view('home', ['properties' => $properties]);
    }
    
    public function about () {
        return view('about', []);
    }
    
    public function testimonials () {
        return view('testimonials', []);
    }
    
    public function contact () {
        return view('contact', []);
    }
    
    public function contactSend(ContactRequest $request)
    {
        Mailer::send(new ContactMail($request->validated()));
        return back()->with('success', 'Your message has been sent');
    }
}
