<?php

namespace App\Http\Controllers\Web\Procucts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Actions\Products\CreateNewProductCategory;

use Intervention\Image\Facades\Image;

class CreateNewProductCategoryController extends Controller
{
    // public $image;
    // public $imageUploaded;
    // public $imageSaved;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/create-new-product-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   \Illuminate\Http\CreateNewProductCategory $action
     */
    public function store(Request $request, CreateNewProductCategory $action)
    {
        if ($request->hasFile('image')) {

            // Validate file is an image
            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);

            $file = $request->file('image');

            $filenameWithExt = $file->getClientOriginalName();// Get Filename

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); // Path of File

            $extension = $file->getClientOriginalExtension(); // Get just Extension

            $fileNameToStore = md5($filename . microtime()).'.'.$extension; // Filename To store

            $file->storeAs('public/product-categories-images', $fileNameToStore); // Store the File

            // make thumbnail
            $thumbnail = Image::make(public_path('product-categories-images/' . $fileNameToStore));
            $thumbnail->resize(200,200);

            // store thumbnail
            $thumbnail->save(public_path('product-categories-images/') . 'thumnail_' . $fileNameToStore ); // Store the File


        }// Else add a dummy image
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        # store values in database
        $productCatagory = $action->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
            'image' => $fileNameToStore,
            'is_active' => $request->is_active == 'on' ? 1 : 0, //if checkbox is "on", set value to 1, otherwise set to 0
        ]);

        if ($productCatagory)
        {
            return redirect(url()->previous())->with('status', 'Product category created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
