<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        return view('admin.web.dashboard')
            ->with('title', 'Dashboard')
            ->with('menu', 'dashboard')
            ->with('data', $data);
    }
}
