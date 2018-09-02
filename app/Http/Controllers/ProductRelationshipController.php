<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductRelationshipController extends Controller
{
    public function category(Product $product)
    {
        return new CategoryResource($product->category);
    }
}