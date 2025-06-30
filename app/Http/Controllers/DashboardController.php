<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class DashboardController extends Controller
{
    public function index(){
    $links = \App\Models\Link::where('user_id', auth()->id())
                ->latest()
                ->paginate(50); // Pagination per 50 data

    return view('dashboard', compact('links'));
}

}
