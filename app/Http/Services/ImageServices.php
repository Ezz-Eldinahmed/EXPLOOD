<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class ImageServices
{
    public static function store($object, $image, $file)
    {
        $path = Storage::putFile($file, $image);

        $object->image()->create([
            'image' => $path,
            'user_id' => auth()->user()->id
        ]);
    }

    public static function destroy($object)
    {
        unlink("storage/" . $object->image['image']);
        $object->image()->delete();
    }
}
