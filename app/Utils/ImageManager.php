<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ImageManager
{
    public static function  uploadImage($request, $post)
    {
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('uploads/posts', $file, ['disk' => 'upload']);
                $post->images()->create([
                    "path" => $path
                ]);
            }
        }
    }
    public static function deleteImages($post)
    {
        if ($post->images->count() > 0) {
            // حذف الصور المرتبطة بالبوست من الجدول
            foreach ($post->images as $image) {
                // لو الصور مخزنة على السيرفر كملفات:
                Self::deleteImage($image->path);
            }
        }
    }
    public static function  updateImage($request, $name, $paths)
    {   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Self::deleteImage($name->image);
        }
        $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('uploads/' . $paths, $file, ['disk' => 'upload']);
        $name->update(['image' => $path]);
    }

    private static function deleteImage($image_path)
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
    }
}
