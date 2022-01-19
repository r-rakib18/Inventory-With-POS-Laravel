<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Vat;
use App\Models\Product\Varient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brands','categories','vats')->get();


        return view('product.productUpload.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->all();
        $brands = Brand::get()->all();
        $vats = Vat::get()->all();
        $variants = Varient::get()->all();
        return view('product.productUpload.create',compact('categories','brands','vats','variants'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_product = sizeof($request->attribute_set);
        $imageName = '';
        if($request->file('image')){
            $imageName =$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('product', $imageName, 'public');
        }
        for($i=0;$i<$total_product;$i++) {
            $product = new Product();
            $product->name = $request->name;
            $product->image = $imageName;
            $product->attribute_set = $request->attribute_set[$i];
            $product->price = $request->price[$i];
            $product->description = $request->description;
            $product->sku = $request->sku[$i];
            $product->barcode = $request->barcode[$i];
            $product->tag = $request->tag;
            $request->vat == 0 ? $product->vat_status = "Disabled": $product->vat_status = "Enabled";
            $product->status = $request->status[$i];
            $product->save();

            if ($request->category!=0){
                $category = array(
                    'category_id'=>$request->category,
                    'product_id'=>$product->id
                );
                DB::table('category_product')->insert($category);
                $category_name = array(
                    'category_name' =>Category::where('id',$request->category)->get()->first()->name,
                );
                DB::table('products')->where('id', $product->id)->update($category_name);


            }
            if ($request->brand!=0){
                $brand = array(
                    'brand_id'=>$request->brand,
                    'product_id'=>$product->id
                );
                DB::table('brand_product')->insert($brand);
                $brand_name = array(
                    'brand_name' =>Brand::where('id',$request->brand)->get()->first()->name,
                );
                DB::table('products')->where('id', $product->id)->update($brand_name);

            }
            if ($request->vat!=0){
                $vat = array(
                    'vat_id'=>$request->vat,
                    'product_id'=>$product->id
                );
                DB::table('product_vat')->insert($vat);
                $vat_name = array(
                    'vat_name' =>Vat::where('id',$request->vat)->get()->first()->item_head,
                );
                DB::table('products')->where('id', $product->id)->update($vat_name);

            }



        }
        return response()->json($total_product, 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $thiscategory = DB::table('category_product')->where('product_id',$request->id)->get()->first();
        $thisbrand = DB::table('brand_product')->where('product_id',$request->id)->get()->first();
        $thisvat = DB::table('product_vat')->where('product_id',$request->id)->get()->first();
//        dd($thisbrand);
        $categories = Category::where('status','Published')->get()->all();
        $brands = Brand::where('status','Published')->get()->all();
        $vats = Vat::where('status','Published')->get()->all();

        return view('product.productUpload.edit',compact('product','categories','brands','vats','thiscategory','thisbrand','thisvat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $imageName = '';
        if($request->file('image')){
            $imageName =$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('product', $imageName, 'public');
        }
        else{
            $imageName=$product->image ;
        }
        $product->name = $request->name ;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->barcode = $request->barcode;
        $product->tag = $request->tag;
        $product->attribute_set = $request->attribute_set;
        $request->vat == 0 ? $product->vat_status = "Disabled": $product->vat_status = "Enabled";
        $product->status = $request->status;
        if ($request->category!=0){
            $category = array(
                'category_id'=>$request->category,
                'product_id'=>$product->id
            );
            DB::table('category_product')->where('product_id', $product->id)->updateOrInsert($category);
        }
        else{
            DB::table('category_product')->where('product_id', $product->id)->delete();
        }
        if ($request->brand!=0){
            $brand = array(
                'brand_id'=>$request->brand,
                'product_id'=>$product->id
            );
            DB::table('brand_product')->where('product_id', $product->id)->updateOrInsert($brand);
        }
        else{
            DB::table('brand_product')->where('product_id', $product->id)->delete();

        }
        if ($request->vat!=0){
            $vat = array(
                'vat_id'=>$request->vat,
                'product_id'=>$product->id
            );
            DB::table('product_vat')->where('product_id', $product->id)->updateOrInsert($vat);
        }
        else{
            DB::table('product_vat')->where('product_id', $product->id)->delete();

        }












        $product->update();
        return redirect()->route('products.product.list')->with('success', $product->name.' Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $product = Product::find($request->id);

        $product->delete();
        return response()->json($product,200);
    }
    /**
     * Generate The combination of Variants.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function attributeSet(Request $request)
    {
        $lengthOfVariant1 = 0;
        $lengthOfVariant2 = 0;
        $lengthOfVariant3 = 0;
        $variant1 = [''];
        $variant2 = [''];
        $variant3 = [''];
        $l=0;
        if($request->variant1){
            $variant1 = explode(',',Varient::where('id',$request->variant1)->get()->first()->value);
            $lengthOfVariant1 = sizeof($variant1);

        }
        if($request->variant2){
            $variant2 = explode(',',Varient::where('id',$request->variant2)->get()->first()->value);
            $lengthOfVariant2 = sizeof($variant2);

        }
        if($request->variant3){
            $variant3 = explode(',',Varient::where('id',$request->variant3)->get()->first()->value);
            $lengthOfVariant3 = sizeof($variant3);

        }

        for($i=0;$i<$lengthOfVariant1;$i++){
            if($lengthOfVariant2>0){
                for($j=0;$j<$lengthOfVariant2;$j++){
                    if($lengthOfVariant3>0){
                        for($k=0;$k<$lengthOfVariant3;$k++) {
                            $attSets[$l] = $variant1[$i] . ' ' . $variant2[$j].' '.$variant3[$k];
                            $l++;

                        }
                    }
                    else{
                        $attSets[$l] = $variant1[$i] . ' ' . $variant2[$j];
                        $l++;

                    }
                }
            }
            else{
                $attSets[$l] = $variant1[$i];
                $l++;

            }
        }
        return response()->json($attSets,200);
    }
}
