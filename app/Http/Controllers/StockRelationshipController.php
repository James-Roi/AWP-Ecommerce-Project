<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockRelationshipController extends Controller
{
    public function product(Stock $stock)
    {
        return new ProductResource($stock->product);
    }
}
