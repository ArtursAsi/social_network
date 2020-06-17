<?php

namespace App\Http\Controllers;

use App\User;
use App\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = auth()->user();
        $users = User::withoutAuthUser()->WithoutAcceptedUsers()->location()->withoutPending()->get();
        $friends = User::friends($user->id)->get();

        return view('user.profile', compact('user', 'users', 'friends'));
    }

    public function show(User $user)
    {

        return view('user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        UserStatus::where('user_id', $user->id)->orWhere('request_to', $user->id)->delete();
        return redirect()->back();
    }

    public function password(User $user)
    {
        return view('user.password', compact('user'));
    }

    public function updatePassword(User $user, Request $request)
    {
        $user->update([
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect(route('profile', compact('user')));
    }

    public function email(User $user)
    {
        return view('user.email', compact('user'));
    }

    public function updateEmail(User $user, Request $request)
    {
        $user->update([
            'email' => $request->get('email')
        ]);
        return redirect(route('profile', compact('user')));
    }
}
