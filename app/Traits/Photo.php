<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait Photo
{
    public function save_photo($path, $photo)
    {
        $ex = $photo->getClientOriginalExtension();
        $photo_name = time() . "." . $ex;
        $photo->storeAs($path, $photo_name, 'Images');
        return "$path/$photo_name";
    }
    public function DataWithPhoto($request, $file_name)
    {
        $data = $request->except('photo');
        $photo = $request->file('photo');
        $data['photo'] = $this->save_photo($file_name, $photo);
        return $data;
    }
    public function UpdateDataWithPhoto($request, $object, $file_name)
    {
        $data = $request->except('photo');
        $new_photo = $request->file('photo');
        $old_photo = $object->photo;
        $data['photo'] = $this->save_photo($file_name, $new_photo);
        Storage::disk("Image")->delete($old_photo);
        return $data;
    }
}
