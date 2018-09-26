<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Package;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$packages = Package::all();
        
        //return PackageResource::collection($packages);
    }

    public function showAdminPackages()
    {
        $packages = Package::all();
        
        return PackageResource::collection($packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = $request->isMethod('put') ? Package::findOrFail($request->id) : new Package;

        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->price = $request->input('price');

        if( $package->save() ){
            return new PackageResource($package);
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
        $package = Package::findOrFail($id);
    
        return new PackageResource($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        
        if( $package->delete() ){
            return new PackageResource($package);
        }
    }
}
