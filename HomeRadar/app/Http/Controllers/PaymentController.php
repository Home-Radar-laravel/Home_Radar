<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment'); // This loads the `payment.blade.php` view
    }

    public function processPayment(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'card_number' => 'required|digits:16',
            'card_holder' => 'required|string|max:255',
            'exp_month' => 'required|numeric|between:1,12',
            'exp_year' => 'required|numeric|min:2021|max:2030',
            'cvv' => 'required|digits:3',
        ]);

        // Here you would process the payment, e.g., using a payment gateway

        // Redirect back to the form with a success message
        return back()->with('success', 'Payment processed successfully!');
    }
}
