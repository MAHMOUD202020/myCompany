<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){


       $categoriesCount = Category::count();

       $partnersCount = Partner::count();

       $projectsCount = Project::count();

       $productsCount = Product::count();



        return view('admin.pages.dashboard.index', get_defined_vars());
    }

}
