<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAttributesController extends Controller
{
    public function createAttributes()
    {

        return view('user.attributes');
    }

    public function storeAttributes(Request $request)
    {
        $user = auth()->user();
        if(isset($user->userAttributes)){
            $user->userAttributes()->update([
                'weight' => $request->get('weight'),
                'height' => $request->get('height'),
                'gender' => $request->get('gender'),

            ]);
        } else {
            $user->userAttributes()->create([
                'weight' => $request->get('weight'),
                'height' => $request->get('height'),
                'gender' => $request->get('gender'),

            ]);
        }
        return redirect(route('profile', compact('user')));
    }

}
