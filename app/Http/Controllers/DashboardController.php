<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class DashboardController extends Controller
{
    public function index()
    {
        // Lead statistics
        $totalLeads = Lead::count();
        $newLeads = Lead::where('status','New')->count();
        $inProgressLeads = Lead::where('status','In Progress')->count();
        $closedLeads = Lead::where('status','Closed')->count();

        return view('dashboard', compact('totalLeads','newLeads','inProgressLeads','closedLeads'));
    }
}
