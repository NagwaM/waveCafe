<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Users Page";
        $users = User::get();
        return view('admin.users', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Users Page";
        return view('admin.addUser', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
            'password' => 'required',
        ], $messages);

        $data['active'] = isset($request->active);

        User::create($data);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit User Page";
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|min:11',
            'email' => 'required|email:rfc',
            'password' => 'required',
        ], $messages);

        $user = User::findOrFail($id);

        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        // If the active checkbox is not checked, it won't be present in the request
        // So we explicitly check if it's set
        $data['active'] = $request->has('active') ? 1 : 0;
     
        User::where('id', $id)->update($data);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

        /**
     * error custom messages
     */
    public function errMsg(){
        return [
            'name.required' => 'The Name is Missed !!, Please Insert It',
            'name.max' => 'The name may not be greater than 100 characters.',
            'name.min' => 'Length is less than 5, Please Insert more Characters',
            'username.required' => 'The username field is required.',
            'username.max' => 'The username may not be greater than 100 characters.',
            'username.min' => 'The username must be at least 5 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
        ];
    }
}