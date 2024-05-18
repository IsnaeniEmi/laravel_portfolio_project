<?php

namespace App\Http\Controllers\Private;

use Illuminate\Http\Request;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use App\Models\ContactUsModel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $footer = FooterModel::first();

        // Total response
        $totalResponse = ContactUsModel::count();

        // Total response today
        $todayResponse = ContactUsModel::whereDate('created_at', Carbon::today())->count();

        // Total response yesterday
        $yesterdayResponse = ContactUsModel::whereDate('created_at', Carbon::yesterday())->count();

        return view('pages.private.dashboard', compact('footer', 'totalResponse', 'todayResponse', 'yesterdayResponse'));
    }
}
