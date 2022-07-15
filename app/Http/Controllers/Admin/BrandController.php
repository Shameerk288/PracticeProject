<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::all();
        return view('Admin.Brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new brand();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // dd($file);
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/images/brand', $filename);
            $brand->logo = $filename;
        };

        $brand->title = $request->input('title');
        $brand->description = $request->input('description');
        $brand->display_order = $request->input('display_order');
        $brand->save();

        /* $brand = brand::create([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'DisplayOrder' => $request->input('display_order'),
         ]); */

        return redirect('/brand');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::find($id);
        return view('Admin.Brands.edit')->with('brand', $brand);
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
        $brand = brand::find($id);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // dd($file);
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/images/brand', $filename);
            $brand->logo = $filename;
        };

        $brand->title = $request->input('title');
        $brand->description = $request->input('description');
        $brand->display_order = $request->input('display_order');
        $brand->update();

        /* $brand = brand::create([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'DisplayOrder' => $request->input('display_order'),
         ]); */

        return redirect('/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        brand::destroy($id);
        return redirect('/brand');
    }
}
