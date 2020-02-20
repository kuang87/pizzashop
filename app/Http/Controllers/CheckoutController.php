<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return view('front.checkout');
        }
        else{
            return redirect('login');
        }
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $data = $request->all();

        $request->validate([
            'firstName' => 'required|min:3|max:35',
            'email' => 'email:filter',
            'phone' => 'required',
            'options' => 'required',
            'paymentMethod' => 'required',
        ]);

        $user = Auth::user();

        if ($data['options'] == 'delivery'){
            $request->validate([
                'city' => 'required|exists:cities,id',
                'address' => 'required',
            ]);

            $address = new Address();
            $address->address = $data['address'];
            $address->city_id = $data['city'];
            $address->user_id = $user->id;
            $address->phone = $data['phone'];

            if (isset($data['save-info'])){
                $user->address()->save($address);
            }
        }


        if (\Cart::getSubTotal() == 0){
            return redirect()->back()->with('cartError', ['Ваша корзина пуста']);
        }

        $order = new Order();
        $order->user_id = $user->id;
        $order->status = 'processed';
        $order->total = \Cart::getTotal();
        $order->address = $address->address ?? 'Самовывоз';
        $order->save();

        $items = \Cart::getContent();
        foreach($items as $item) {
            $order->products()->attach($item->id, ['quantity' => $item->quantity, 'total' => $item->quantity * $item->price]);
        }

        \Cart::clear();

        return redirect('thankyou');
    }
}
