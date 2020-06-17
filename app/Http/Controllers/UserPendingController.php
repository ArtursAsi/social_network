<?php

namespace App\Http\Controllers;

use App\User;
use App\userPending;
use App\UserStatus;
use Illuminate\Http\Request;

class UserPendingController extends Controller
{
    public function pendingIndex()
    {
        $users = User::withoutAuthUser()->pendings()->get();
        return view('user.pending', compact('users'));
    }

    public function request(User $user)
    {
        $authUser = auth()->user();

        $authUser->userPendings()->create([
            'request_to' => $user->id,
            'status' => UserPending::PENDING,
        ]);

        return redirect()->back();
    }

    public function accept(User $user)
    {
        $authUser = auth()->user();

        $authUser->userStatuses()->create([
            'request_to' => $user->id,
            'status' => UserStatus::ACCEPTED,
        ]);
        $user->userPendings()->delete();

        return redirect()->back();
    }

    public function decline(User $user)
    {
        $authUser = auth()->user();

        $authUser->userStatuses()->create([
            'request_to' => $user->id,
            'status' => UserStatus::DECLINED,
        ]);
        $user->userPendings()->delete();


        return redirect()->back();
    }

}
