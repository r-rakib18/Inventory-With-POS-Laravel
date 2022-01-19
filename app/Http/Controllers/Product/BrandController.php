<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\fileExists;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get()->all();
        return view('product.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.brand.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:brands,name',
            'image' => 'file|max:1024',

        ],
            [
                'name.required' => 'Please give a name',
                'name.max' => 'Name length maximum 100',
                'image.file' => 'Please give a valid image',
                'image.size' => 'Image size maximum 1024kb',
            ]);

        $brand = new Brand();
        if($request->file('image')){
            $imageName =$request->file('image')->getClientOriginalName(). '.'. time();
            $path = $request->file('image')->storeAs('brand', $imageName, 'public');
            $brand->image = $imageName;
        }
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->description = $request->description;
        //dd($brand);
        $brand->save();
        
        return response()->json(['success' => 'Brand "'.$brand->name.'" Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Request $request)
    {
        $brand = Brand::find($request->id);
        return response()->json($brand, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Request $request)
    {
        $brand = Brand::find($request->id);
        return view('product.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->description = $request->description;

        if($request->file('image')){
            $path = 'storage/brand/'. $brand->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $imageName =$request->file('image')->getClientOriginalName(). '.'. time();
            $path = $request->file('image')->storeAs('brand', $imageName, 'public');
            $brand->image = $imageName;
        }
        $brand->update();
        return redirect()->route('products.brand.list')->with('success', $brand->name.' Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function delete(Request $request)
    {
        $brand = Brand::find($request->id);
        $path = 'storage/brand/'.$brand->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $brand->delete();
        return response()->json($brand,200);
    }
}
