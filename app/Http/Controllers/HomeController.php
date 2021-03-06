<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Address;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        $cartCount = Cart::content()->count();
        $allCount = Product::count('id');
        $products = Product::with('images')
                        ->whereHas('category', function ($query) {
                            $query->whereIn('categories.id', [5,6,7,8,9,10]);
                        })
                        ->orderBy('id', 'ASC')
                        ->take(8)
                        ->get();
        $saleProducts = Product::with('images')
                        ->where('products.discount_percent', '<>', '0')
                        ->orderBy('id', 'ASC')
                        ->get();
        return view('users.home', compact('allCount', 'products','saleProducts','cartCount','cart','totalAmount'));
    }

    public function showProfile(){
        $cart = Cart::content();
        $totalAmount = Cart::priceTotal();
        $cartCount = Cart::content()->count();
        return view('users.profile', compact('cartCount','cart','totalAmount'));
    }

    public function updateProfile(UpdateProfileRequest $request, $userID){
        $data = $request->except('_token', '_method');
        DB::beginTransaction();
        try {
            User::find($userID)->update($data);
            Address::where('user_id', $userID)->update(
                                array(
                                    'phone' => $data['phone'],
                                    'street' => $data['street'],
                                    'ward' => $data['ward'],
                                    'district' => $data['district'],
                                    'city' => $data['city'],
                                    'zip_code' => $data['zip_code'],
                                ));
        DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        $user = User::with('addresses')->find($userID);
        \Auth::setUser($user);
        return redirect()->route('show-profile', $user->id)->with('inform-message', 'Update Profile Successfully!');
    }

}
