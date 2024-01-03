<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $encryptionPassword = Crypt::encrypt($request->get('password'));
        $user->password = $encryptionPassword;
        $user->remember_token = $request->user()->createToken($request->name)->plainTextToken;
        
        $user->save();
        return response()->json(['user' => $user], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(['user' => $user], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['Id' => $user->id, 'Message' => 'User successfully updated'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['Id' => $user->id, 'Message' => 'User successfully removed'], Response::HTTP_ACCEPTED);
    }
}
