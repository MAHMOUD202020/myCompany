<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('haveRole:contact.index')->only('index');
        $this->middleware('haveRole:contact.destroy')->only('destroy');
    }

    public function index(){

        $messages = Message::latest()->get();

        return view('admin.pages.messages.index' , compact('messages'));
    }


    public function destroy($id){

        Message::where('id' , $id)->delete();
    }
}
