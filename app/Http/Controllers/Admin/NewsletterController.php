<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;

class NewsletterController extends Controller
{

    use MDT_Query , MDT_Method_Action;

    public function __construct()
    {
        $this->middleware('haveRole:newsletter.index')->only('index');
        $this->middleware('haveRole:newsletter.destroy')->only('destroy');
        $this->middleware('haveRole:newsletter.restore')->only('restore');
        $this->middleware('haveRole:newsletter.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Newsletter::class ,
            'Admin/pages/newsletters/index',
            IS_TRASH, // Soft Delete

        ); // end query

    }


    public function destroy($id)
    {
        return $this->MDT_delete(Newsletter::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Newsletter::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Newsletter::class , $id);
    }



}
