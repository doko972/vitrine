<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('dashboard.messages.index', compact('messages'));
    }

    public function show(int $id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['read' => true]);
        return view('dashboard.messages.show', compact('message'));
    }

    public function destroy(int $id)
    {
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('dashboard.messages.index')->with('success', 'Message supprimé.');
    }
}
