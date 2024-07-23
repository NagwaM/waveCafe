<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Messages Page";
        $messages = Message::get();
        return view('admin.messages', compact('messages', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'name' => 'required|string|max:100|min:5',
            'email' => 'required|email:rfc',
            'message' => 'required|string|min:10',
        ], $messages);

        Message::create($data);
        return redirect()->route('contactUs')->with('success', 'Message sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Show Messages Page";
        $message = Message::findOrFail($id);
        return view('admin.showMessages', compact('message', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Message::where('id', $id)->delete();
        return redirect('messages');
    }

    /**
     * error custom messages
     */
    public function errMsg(){
        return [
            'name.required' => 'The Name is Missed !!, Please Insert It.',
            'name.max' => 'The Name may not be greater than 100 characters.',
            'name.min' => 'Length is less than 5, Please Insert more Characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'message.required' => 'The Message is Missed !! PLease Insert one.',
            'message.min' => 'The Message cannot be less than 5 characters.',
        ];
    }
}