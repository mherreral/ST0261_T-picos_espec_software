<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ImageWebStorage implements ImageStorage
{
    public function store($request)
    {
        if ($request->get('profile_image') != '') {
            $img = $request->get("filename");

            Storage::disk('public')->put(
                $img,
                file_get_contents($request->get('profile_image'))
            );
        }
    }
}
