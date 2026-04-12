<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'messages_total'  => ContactMessage::count(),
            'messages_unread' => ContactMessage::where('read', false)->count(),
            'settings_count'  => Setting::count(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
