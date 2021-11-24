<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

       $messagesToday_count = Message::where('created_at' , '>' , Carbon::now()->subDay())->count();

       $messages_count = Message::count();

       $projects_count = Project::count();

       $services_count = Service::count();

       $newsletters_count = Service::count();

       $newslettersToday_count = Newsletter::where('created_at' , '>' , Carbon::now()->subDay())->count();;


        return view('admin.pages.dashboard.index')->with([

            'messagesToday_count' => $messagesToday_count,
            'messages_count' => $messages_count,
            'projects_count' => $projects_count,
            'services_count' => $services_count,
            'newsletters_count' => $newsletters_count,
            'newslettersToday_count' => $newslettersToday_count,
        ]);
    }

}
