<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get()->all();

        return view('product.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','Published')->get()->all();

        return view('product.category.create',compact('categories'));

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
            'name' => 'required|max:100|unique:categories,name',
            'image' => 'file|max:1024',

        ],
            [
                'name.required' => 'Please give a name',
                'name.max' => 'Name length maximum 100',
                'image.file' => 'Please give a valid image',
                'image.size' => 'Image size maximum 1024kb',
            ]);
        $category = new Category();
        if($request->file('image')){
            $imageName =$request->file('image')->getClientOriginalName(). '.'. time();
            $path = $request->file('image')->storeAs('category', $imageName, 'public');
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $request->status == 0 ? $category->status = "Drafts" : $category->status = $request->status;
        $category->parent_id = $request->parent_category;
        $category->description = $request->description;
        $category->save();
        return response()->json(['success' => 'Category "'.$category->name.'" Created successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function show(Request $request)
    {
        $category = Category::find($request->id);
        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        $categories = Category::get()->all();
return view('product.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_category;
        $request->status == 0 ? $category->status = "Drafts" : $category->status = $request->status;

        if($request->file('image')){
            $path = 'storage/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }


            $imageName =$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('category', $imageName, 'public');
            $category->image = $imageName;
        }
        $category->update();
//        $response_messages = $category->name.' '
        return redirect()->route('products.category.list')->with('success', $category->name.' Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $path = 'storage/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        return response()->json($category,200);
    }
}
