<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest ;
use App\Models\Contact;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;

class ContactController extends Controller
{

    use MDT_Query , MDT_Method_Action;

    public function __construct()
    {
        $this->middleware('haveRole:contact.index')->only('index');
        $this->middleware('haveRole:contact.create')->only(['create' , 'store']);
        $this->middleware('haveRole:contact.update')->only('update');
        $this->middleware('haveRole:contact.destroy')->only('destroy');
        $this->middleware('haveRole:contact.restore')->only('restore');
        $this->middleware('haveRole:contact.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Contact::class ,
            'Admin/pages/contacts/index',
            IS_TRASH, // Soft Delete
        ); // end query

    }


    public function create()
    {
        return view('admin.pages.contacts.create');
    }


    public function store(ContactRequest $request)
    {

        Contact::create($request->validated());

        return back()->with('success' ,  __('form.response.create success'));

    }


    public function update(ContactRequest $request, $id)
    {

        $contact = Contact::withTrashed()
            ->where('id' , $id)
            ->firstOrFail();

        $contact->update($request->validated());

        return response(['status' => 'success' , 'message' =>  __('form.response.update success')]);
    }


    public function destroy($id)
    {
        return $this->MDT_delete(Contact::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Contact::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Contact::class , $id);
    }



      ///////////////////////////////////////////////////////
     ////                                               ////
    //// ..........  Methods Clean Code .............. ////
   ////                                               ////
  ///////////////////////////////////////////////////////

}
