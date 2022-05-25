<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;


class ImageLocalStorage implements ImageStorage
{
    public function store($request)
    {
        if ($request->hasFile('profile_image')) {
            $img = $request->get("filename");

            Storage::disk('public')->put(
                $img,
                file_get_contents($request->file('profile_image')->getRealPath())
            );
        }
    }
}
