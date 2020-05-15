<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Product;
class ProductController extends Controller
{
  public function __construct(){
    $this->middleware(['auth'])->only(['create','index','user']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products',Product::paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
      $image=$request->image->store('products');

        Product::create([
          'name'=>$request->name,
          'description'=>$request->description,
          'price'=>$request->price,
          'image'=>$image,
          'user_id'=>auth()->user()->id

        ]);
        session()->flash('success','Your Product is added successfully');
        return redirect(route('userproducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.create')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
      $data=$request->only(['name','description','price']);
       if (request()->hasFile('image')) {
         $image=$request->image->store('products');
         $data['image']=$image;
       }
$product->update($data);
session()->flash('success','You updated your product successfully');
return redirect(route('userproducts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success','You deleted your product successfully');
        return redirect(route('products.index'));

    }
    public function user(){
      return view('products.userpro')->with('products',auth()->user()->products()->paginate(4));
    }
}
