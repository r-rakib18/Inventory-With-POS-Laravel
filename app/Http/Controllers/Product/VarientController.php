<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Varient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class VarientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Varient::get()->all();

        return view('product.varient.index',compact('variants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variants = Varient::get()->all();

        return view('product.varient.create',compact('variants'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $color = ['red','green','black'];
//        $size = ['s','xl','m','xxl'];
//        $weight = ['5kg','6Kg','2Kg','8Kg'];
//        $l=0;
//        $j=3;
//        for($i=0;$i<3;$i++){
//            for($j=0;$j<4;$j++){
//                for($k=0;$k<4;$k++) {
//                    $combo[$l] = $color[$i] . ' ' . $size[$j].' '.$weight[$k];
//                }
//                $l++;
//            }
//        }

        $variant = new Varient();
        $variant->key = $request->key;
        $variant->status = $request->status;
//        $variant->value = implode(",",$request->values);
        $variant->value =$request->values;
        $variant->save();
        return response()->json(['success' => 'Variant "'.$variant->key.'" Created successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Category  $variant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $variant = Varient::find($request->id);
        return response()->json($variant, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Category  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $variant = Varient::find($request->id);
//        dd(explode(",",$variant->value));

        return view('product.varient.edit',compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Category  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $variant = Varient::find($id);
        $variant->key = $request->key;
        $variant->status = $request->status;
        $variant->value = implode(",",$request->values);
        $variant->update();
        return redirect()->route('products.variant.list')->with('success', $variant->name.' Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Category  $variant
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $variant = Varient::find($request->id);
        $variant->delete();
        return response()->json($variant,200);
    }
}
