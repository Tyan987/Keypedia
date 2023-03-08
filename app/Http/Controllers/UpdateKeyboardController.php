<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keyboards;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class UpdateKeyboardController extends Controller
{
    public function index($id)
    {
        $category = Categories::all();
        $keyboard = Keyboards::where('id', $id)->first();
        return view('Keyboard.updateKeyboard', ['keyboard' => $keyboard], ['categories' => $category]);
    }

    public function updateKeyboard(Request $request, $id)
    {
        $keyboard = Keyboards::find($id);

        $rules = [
            "name" => 'required|min:5',
            "price" => 'required|integer|min:1',
            "description" => 'required|min:20',
            "category" => 'required'
        ];

        $request->validate($rules);

        $file = $request->file('image');

        if($file != null){
            Storage::delete('public/'.$keyboard->image);
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images/keyboards', $file, $imageName);
            $imagePath = 'images/keyboards/'.$imageName;
            $keyboard->image = $imagePath;
        }

        else{
            $keyboard->image = $keyboard->image;
        }

            $keyboard->name = $request->name != null ? $request->name: $keyboard->name;
            $keyboard->price = $request->price != null ? $request->price: $keyboard->price;
            $keyboard->description = $request->description != null ? $request->description: $keyboard->description;
            $keyboard->image = $request->image != null ? $imagePath: $keyboard->image;
            $keyboard->category_id = $request->category_id != null ? $request->category_id: $keyboard->category_id;

            $keyboard->update();
            return redirect('/');
    }
}
