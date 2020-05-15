<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class WelcomeController extends Controller
{

public function index(){
  return view('welcome')->with('products',Product::paginate(3));
}

public function show(Product $product){

  return view('products.show')->with('product',$product);
}

}
