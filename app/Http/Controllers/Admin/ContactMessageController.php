<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', ['messages' => ContactMessage::query()->orderByDesc('created_at')->paginate(15)]);
    }

    public function show(ContactMessage $contactMessage)
    {
        if ($contactMessage->status === 'new') {
            $contactMessage->update(['status' => 'read', 'read_at' => now()]);
        }
        return view('admin.messages.show', ['message' => $contactMessage]);
    }

    public function updateStatus(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate(['status' => ['required','in:new,read,replied,archived']]);
        $data['read_at'] = in_array($data['status'], ['read','replied','archived'], true) ? ($contactMessage->read_at ?? now()) : null;
        $data['replied_at'] = $data['status'] === 'replied' ? ($contactMessage->replied_at ?? now()) : null;
        $contactMessage->update($data);
        return back()->with('success', 'Message status updated.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
