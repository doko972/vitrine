<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $imageSettings = Setting::where('type', 'image')->get();
        return view('dashboard.media.index', compact('imageSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key'   => 'required|string',
            'image' => 'required|image|max:5120',
        ]);

        $key = $request->input('key');
        $old = setting($key);
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        $path = $request->file('image')->store('uploads', 'public');
        Setting::set($key, $path);

        return back()->with('success', 'Image mise à jour.');
    }

    public function destroy(string $key)
    {
        $path = setting($key);
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        Setting::set($key, null);

        return back()->with('success', 'Image supprimée.');
    }
}
