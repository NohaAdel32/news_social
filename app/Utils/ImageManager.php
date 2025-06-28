<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ImageManager{
   public static function  uploadImage($request,$post){
                  if ($request->hasFile('images')){
                foreach($request->images as $image){
                    $file=Str::uuid().time().'.' . $image->getClientOriginalExtension();
                    $path=$image->storeAs('uploads/posts',$file,['disk'=>'upload']);
                    $post->images()->create([
                        "path"=>$path
                    ]);
                }
            }
   }
public static function deleteImages($post){
if ($post->images->count() > 0) {
            // حذف الصور المرتبطة بالبوست من الجدول
            foreach ($post->images as $image) {
                // لو الصور مخزنة على السيرفر كملفات:
                if (File::exists(public_path($image->path))) {
                    // unlink(public_path( $image->path)); // حذف الملف نفسه
                    File::delete(public_path($image->path));
                }

                $image->delete(); // حذف السطر من جدول الصور
            }
        }
}
    

}