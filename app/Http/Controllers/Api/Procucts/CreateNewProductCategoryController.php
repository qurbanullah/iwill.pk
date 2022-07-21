<?php

namespace App\Http\Controllers\Api\Procucts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Products\CreateNewProductCategory;

class CreateNewProductCategoryController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateNewProductCategory $action)
    {
        dd($request['is_active'] == 'on' ? 1 : 0);
        dd($request['name'], $request['content'], $request['is-active']);
        $productCatagory = $action->create([
            'name' => $request['name'],
            'is_active' => $request['is_active'] == 'on' ? 1 : 0,
            'content' => $request['content'],
        ]);
        return response()->json($productCatagory);
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
