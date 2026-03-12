<?php
// MessageController
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index() { return view('admin.pages.messages.index', ['messages' => Message::latest()->get()]); }
    public function show(Message $message) {
        if (!$message->is_read) $message->update(['is_read'=>true,'read_at'=>now()]);
        return view('admin.pages.messages.show', compact('message'));
    }
    public function destroy(Message $message) { $message->delete(); return redirect()->route('admin.messages.index')->with('success','Message deleted.'); }
    public function markRead(Message $message) { $message->update(['is_read'=>true,'read_at'=>now()]); return back(); }
}
