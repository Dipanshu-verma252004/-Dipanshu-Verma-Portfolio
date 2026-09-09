<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        ContactMessage::query()->create(
            $request->only(['name', 'email', 'subject', 'message']),
        );

        return redirect()->route('frontend.contact');
    }
}
