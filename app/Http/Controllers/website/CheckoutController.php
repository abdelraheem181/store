<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\PaymentConfirmation;
use App\Models\Checkout;
use App\Models\Order;
use App\Services\TapPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'payment_method' => 'required'
        ]);

      
        $cart = collect(session()->get('cart'));
        
        //total amount
        $totalAmount = $cart->sum(
            function($item) { 
                return $item['price'] * $item['quantity']; 
            }
        );
        //total quantity
        $totalQuantity = $cart->sum(
            function($item) 
            { 
                return $item['quantity']; 
            }
        ); 

        $orderData['user_id'] = auth()->user()->id;
        $orderData['total_amount'] = $totalAmount;
        $orderData['quantity'] = $totalQuantity;
        $orderData['order_number'] = $this->generateOrderNumber();
       
        $order = Order::create($orderData);

        foreach (session()->get('cart') as $key => $item ) {
            $order->orderBooks()->create([
                'book_id' => $key,
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
        }


        $body = [
            'amount'=> $totalAmount,
            'description'=> 'Selling books from '.$orderData['first_name'].' '.$orderData['last_name'],
            'first_name'=> $orderData['first_name'],
            'last_name'=> $orderData['last_name'],
            'email'=> $orderData['email'],
            'country_code'=> '966',
            'phone_number'=> $orderData['phone'],
        ];

        // return $body;

        $response  = TapPaymentService::pay($body);

        $order->update([
            'payment_id' => $response->id
        ]);
        
        // session()->forget('cart');
        
        return redirect()->away($response->transaction->url);

    }

    public function generateOrderNumber()
    {
        return 'ORD-' . date('Y') . '-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     */
    public function paymentCallback(Request $request)
    {
        $payment_id = $request->tap_id;

       $charge = TapPaymentService::getCharge($payment_id);

       $order = Order::where('payment_id', $payment_id)->first();

       abort_if(!$order, 404, 'Order not found');

       if(isset($charge->status) && $charge->status == 'CAPTURED'){
            $order->update([
                'payment_status' => 'paid'
            ]);
            
            // Clear the cart session after successful payment
            session()->forget('cart');
            Mail::to($order->user->email)->send(new PaymentConfirmation($order, $order->user));
            return view('website.success-payment', compact('order'))->with('success', 'Payment successful');
       }
       else{
        $order->update([
            'payment_status' => 'failed'
        ]);
        return view('website.failed-payment')->with('error', 'Payment failed');
        }
       
  

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
