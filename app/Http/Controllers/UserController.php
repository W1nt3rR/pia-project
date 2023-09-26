<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $formData = $request->validate([
            'first-name' => ['required', 'string', 'min:2', 'max:255'],
            'last-name' => ['required', 'string', 'min:2', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:16384'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birth-date' => ['required', 'date'],
            'phone-number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'password-confirmation' => ['required', 'string', 'min:8'],
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $formData['role'] = 'user';
        $formData['picture'] = $formData['picture']->store('public/profile-pictures');

        $user = User::create($formData);

        auth()->login($user);

        redirect('/dashboard');
        
    }

    /**
     * Attempt to log the user in.
     */
    public function login(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if (!auth()->attempt($formData)) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid credentials.',
            ]);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
