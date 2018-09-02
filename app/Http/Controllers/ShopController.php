<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductResource;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(6);
        
        return ProductResource::collection($products);
    }

}
