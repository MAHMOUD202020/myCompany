<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MessageRequest;
use App\Models\Block;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){

        $page = Page::customSelect()
            ->where('slug' , 'contact-us')
            ->firstOrFail();

        $contacts = Contact::customSelect()->get();

        return view('web.pages.contact.index' , compact('contacts' ,'page'));
    }

    public function save(MessageRequest $request){

        Message::create([
            'name' => strip_tags($request->name),
            'email' => strip_tags($request->email),
            'phone' => strip_tags($request->phone),
            'subject' => strip_tags($request->subject),
            'message' => strip_tags($request->message),
        ]);

        return back()->with('success' , __('form.label.message send success'));
    }

}
