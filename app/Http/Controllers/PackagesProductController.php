<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesProduct;
use App\Http\Resources\Packages_ProductResource;
use App\Http\Resources\Packages_ProductsResource;

class PackagesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages_product = PackagesProduct::all();
        //dd($packages_product);
        return new Packages_ProductsResource($packages_product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package_product = $request->isMethod('put') ? PackagesProduct::findOrFail($request->id) : new PackagesProduct;
        
        $package_product->package_id = $request->input('package_id');
        $package_product->product_id = $request->input('product_id');
        
        if( $package_product->save() ){
            return new Packages_ProductResource($stock);
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
        $packages_product = PackagesProduct::all()->where("package_id", "=", $id);//PackagesProduct::where('package_id', '=' ,$id);
        //dd($packages_product);
        return new Packages_ProductsResource($packages_product);
    }

    public function update(Request $request)
    {
        $package_product = PackagesProduct::all()->where("product_id","=",$request->input('product_id'),"and")->where("package_id","=",$request->input('package_id'))->first();
        
        $package_product->product_quantity = $request->input('product_quantity');
        
        if( $package_product->save() ){
            return new Packages_ProductResource($package_product);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package_product = PackagesProduct::findOrFail($id);
        
        if( $package_product->delete() ){
            return new Packages_ProductResource($package_product);
        }
    }
}
