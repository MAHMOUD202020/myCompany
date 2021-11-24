<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest ;
use App\Models\User;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;

class UserController extends Controller
{

    use MDT_Query , MDT_Method_Action;

    public function __construct()
    {
        $this->middleware('haveRole:user.index')->only('index');
        $this->middleware('haveRole:user.create')->only(['create' , 'store']);
        $this->middleware('haveRole:user.update')->only('update');
        $this->middleware('haveRole:user.destroy')->only('destroy');
        $this->middleware('haveRole:user.restore')->only('restore');
        $this->middleware('haveRole:user.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            User::class ,
            'Admin/pages/users/index',
            IS_TRASH, // Soft Delete

        ); // end query

    }


    public function create()
    {
        return view('admin.pages.users.create');
    }


    public function store(UserRequest $request)
    {

        User::create($this->columnsDB($request));

        return back()->with('success' ,  __('form.response.create user'));

    }


    public function update(UserRequest $request, $id)
    {


        $user = User::withTrashed()
            ->where('id' , $id)
            ->firstOrFail();

        $user->update($this->columnsDB($request));

        return response(['status' => 'success' , 'message' =>  __('form.response.update user')]);
    }


    public function destroy($id)
    {
        return $this->MDT_delete(User::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(User::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(User::class , $id);
    }



      ///////////////////////////////////////////////////////
     ////                                               ////
    //// ..........  Methods Clean Code .............. ////
   ////                                               ////
  ///////////////////////////////////////////////////////


    public function columnsDB($request){

        $password = $request->password ? 'password' : '';

        return [
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            $password    => bcrypt($request->password),
        ];
    }

}
