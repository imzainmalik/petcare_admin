<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\StripeClient;

class UserController extends Controller
{

    public function index()
    {
        $services = Service::where('is_available', 1)->get();
        return view('user.index', get_defined_vars());
    }

    public function booking_payment(Request $request, $id)
    {
        dd($request->all());
        $service = Service::where('id', $id)->first();
        Stripe::setApiKey('sk_test_51MgDrRGrh32uccZtv5RkDcgMjR3VkO3AmdGu9Jmp6miqCLx4oYBYWnRezpRYD4PlHlZGCDsr0KgZZlwtodEByEc500IZAO9K6S');

        $stripe = new StripeClient('sk_test_51MgDrRGrh32uccZtv5RkDcgMjR3VkO3AmdGu9Jmp6miqCLx4oYBYWnRezpRYD4PlHlZGCDsr0KgZZlwtodEByEc500IZAO9K6S');
        $customer = $stripe->customers->create(array(
            'source' => $request->stripeToken,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'description' => "Test payment from pet care boooking",
        ));

        dd($customer);
        // $charge = Charge::create([
        //     "amount" => $service->price * 100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     "description" => "Test payment from pet care boooking.",
        // ]);

    }
}
