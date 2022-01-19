<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Vat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vats = Vat::get()->all();

        return view('product.vat.index',compact('vats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vats = Vat::get()->all();

        return view('product.vat.create',compact('vats'));

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
//        dd($combo);

        $vat = new Vat();
        $vat->item_head = $request->item_head;
        $vat->description = $request->description;
        $vat->status = $request->status;
        $vat->value = $request->value;
        $vat->save();
        return response()->json(['success' => 'Vat "'.$vat->item_head.'" Created successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vat = Vat::find($request->id);
        return response()->json($vat, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $vat = Vat::find($request->id);
//        dd(explode(",",$vat->value));

        return view('product.vat.edit',compact('vat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vat = Vat::find($id);
        $vat->item_head = $request->item_head;
        $vat->description = $request->description;
        $vat->status = $request->status;
        $vat->value = $request->value;
        $vat->update();
        return redirect()->route('products.vat.list')->with('success', $vat->item_head.' Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $vat = Vat::find($request->id);
        $vat->delete();
        return response()->json($vat,200);
    }
}
