<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Notifications\AddedToCart;
class ShopController extends Controller
{
  public function addToCart(Product $product){
    $cartItem=Cart::add([
      'id'=>$product->id,
      'name'=>$product->name,
      'price'=>$product->price,
      'qty'=>request()->qty,
      'weight'=>20
    ]);

    Cart::associate($cartItem->rowId,'App\Product');
  $product->user->notify(new AddedToCart($product));
    return redirect(route('cart'));
  }

  public function cart(){
    return view('products.cart');
  }

  public function delete($id){
    Cart::remove($id);
    return redirect(route('cart'));
  }

  public function incre($id,$qty){
    Cart::update($id,$qty+1);
    return redirect(route('cart'));
  }
  public function decre($id,$qty){
    Cart::update($id,$qty-1);
        return redirect(route('cart'));
  }
  public function homeaddToCart(Product $product){
    $cartItem=Cart::add([
      'id'=>$product->id,
      'name'=>$product->name,
      'price'=>$product->price,
      'qty'=>1,
      'weight'=>20
    ]);

    Cart::associate($cartItem->rowId,'App\Product');
    $product->user->notify(new AddedToCart($product));

    return redirect(route('cart'));
  }

  public function index(){
    return view('products.check');
  }
  public function notify(){
    auth()->user()->unReadNotifications->markAsRead();
    return view('notifications.index')->with('notifications',auth()->user()->notifications()->paginate(3));
  }
}
