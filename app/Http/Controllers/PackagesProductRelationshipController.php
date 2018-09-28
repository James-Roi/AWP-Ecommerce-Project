<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackagesProductRelationshipController extends Controller
{
    public function package(Packages_Product $packages_product)
    {
        return new PackageResource($packages_product->package);
    }

    public function product(Packages_Product $packages_product)
    {
        return new ProductsResource($packages_product->product);
    }
}
