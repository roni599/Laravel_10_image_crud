<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ImagecrudController extends Controller
{
    public function all_image()
    {
        $images = ImageCrud::all();
        return view('all_image', compact('images'));
    }
    public function upload_image()
    {
        return view('image_upload');
    }

    public function store_image(Request $request)
    {
        $request->validate([
            'image_name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp|max:5120',
        ]);

        $imageCrud = new ImageCrud();
        $imageCrud->name = $request->image_name;

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(1, 1000) . '_' . $request->image_name . '.' . $image->getClientOriginalExtension();
            $image->move('images/uploads', $imageName);
            $imageCrud->image = $imageName;
        }

        $imageCrud->save();

        Session::flash('message', 'Product image added success.');
        return redirect()->back();
    }

    public function edit_image(Request $request)
    {
        $imageId = ImageCrud::findOrFail($request->image_id);
        return view('edit_image', compact('imageId'));
    }

    public function update_image(Request $request)
    {
        $imageCrud = ImageCrud::findOrFail($request->editImage_id);
        $request->validate([
            'image_name' => 'required',
        ]);

        $imageName = '';
        $deleteOldImage = 'images/uploads/' . $imageCrud->image;
        if ($image = $request->file('image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }
            $imageName = rand(1, 1000) . '_' . $request->image_name . '.' . $image->getClientOriginalExtension();
            $image->move('images/uploads', $imageName);
        } else {
            $imageName = $imageCrud->image;
        }
        $imageCrud->update([
            'name' => $request->input('image_name'),
            'image' => $imageName
        ]);

        Session::flash('message', 'Product image updated successfully.');
        return redirect()->back();
    }

    public function delete_image(Request $request)
    {
        $imageCrud = ImageCrud::findOrFail($request->image_id);

        $deleteOldImage = 'images/uploads/' . $imageCrud->image;
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $imageCrud->delete();
        Session::flash('message', 'Product image Deleted successfully.');
        return redirect()->back();
    }
}
