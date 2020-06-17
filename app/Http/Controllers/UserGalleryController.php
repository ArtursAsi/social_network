<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use App\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserGalleryController extends Controller
{
    public function createGallery()
    {
        $user = auth()->user();
        return view('gallery.gallery', compact('user'));
    }

    public function storeGallery(Request $request)
    {
        $user = auth()->user();

        $pictures = $request->file('name');
        foreach ($pictures as $picture) {

            $user->userGalleries()->create([
                'name' => $picture->store('/galleries')
            ]);

        }
        return redirect(route('gallery.create', compact('user')));

    }

    public function destroyGallery(UserGallery $gallery)
    {
        Storage::delete($gallery->name);
        $gallery->delete();

        return redirect()->back();
    }

    public function updateProfilePictureFromGallery(UserGallery $picture)
    {
        $user = auth()->user();
        $user->userData()->where('user_id', $user->id)->update(['picture' => $picture->name]);
        return redirect()->back();
    }

    public function show(UserGallery $gallery, User $user)
    {
        return view('gallery.target', compact('gallery', 'user'));
    }
}
