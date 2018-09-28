<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Stock;
use App\PackagesProduct;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category'])->take(9)->orderBy('created_at','desc')->get();
        
        return new ProductsResource($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->isMethod('put') ? Product::findOrFail($request->id) : new Product;
        
        if($request->image!="")
        {
            $exploded = explode(',', $request->input('image'));
            $decoded = base64_decode($exploded[1]);
            $ext = explode('/', $exploded[0]);
            $ext = explode(';', $ext[1]);
            $ext = $ext[0];
    
            $fileName = "product".$request->input('id').".".$ext;
    
            $path = public_path().'/images/products/'.$fileName;
            file_put_contents($path, $decoded);
            $path_to_store = substr($path,strpos($path,'/images'));
            $product->image = '..'.$path_to_store;
        }
        else if($request->isMethod('post'))
        {
            $product->image = '../images/placeholder.png';
        }        
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if($product->save())
        {
            if($request->isMethod('post'))
            {
                $product_id = $product->id;

                $stock = new Stock();
                $stock->product_id = $product_id;
                $stock->save();
            }

            return new ProductResource($product);
        }

        //dd($product->last_insert_id());

        //if($request->isMethod('post'))
        //{
        //    $inventory = new Inventory();
            //$inventory->product_id = $product->last_insertid();
       // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if( $product->delete() ){
            return new ProductResource($product);
        }
    }

    public function ShopProducts()
    {
        $products = Product::orderBy('created_at','desc')->paginate(6);
        
        return new ProductsResource($products);
    }

    public function ProductList()
    {
        $products = Product::orderBy('name','asc')->paginate(9);
        
        return new ProductsResource($products);
    }

    public function PackageProductList($id)
    {
        $package_product_ids = array();
        $packages_products = PackagesProduct::all()->where("package_id", "=", $id);
        foreach($packages_products as $key)
        {
            array_push($package_product_ids, $key->product_id);
        }
        $products = Product::all()->whereNotIn("id", $package_product_ids);
        return new ProductsResource($products);
    }
}
