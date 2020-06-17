<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDataController extends Controller
{
    public function createData()
    {
        return view('user.data');
    }

    public function edit(UserData $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, UserData $user)
    {
        $user->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'age' => $request->get('age'),
            'location' => $request->get('location'),
            'bio' => $request->get('bio'),

        ]);
        return redirect(route('profile', compact('user')));
    }

    public function storeData(Request $request)
    {
        $user = auth()->user();
        if (isset($user->userData)) {
            $user->userData()->update([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'age' => $request->get('age'),
                'location' => $request->get('location'),
                'bio' => $request->get('bio'),
                'picture' => $request->file('picture')->store('/pictures')

            ]);
        } else {
            $user->userData()->create([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'age' => $request->get('age'),
                'location' => $request->get('location'),
                'bio' => $request->get('bio'),
                'picture' => $request->file('picture')->store('/pictures')

            ]);
        }
        return redirect(route('profile'));
    }

    public function updatePicture(UserData $user, Request $request)
    {

        $picture = $request->file('picture')->store('/pictures');
        $user->update([
            'picture' => $picture
        ]);


        return redirect()->back();
    }

    public function search(Request $request)
    {
        $q = $request->get('q');
        if ($q != " ") {

            $user = UserData::where('name',$q)->orWhere('surname', $q)->orWhere('location', $q)->get();
            if (count($user) > 0) {

                return view('user.search')->with('details', $user)->with('query', $q);
            }

        }
        return view('user.search')->with('message', 'No users found!');
    }


}
