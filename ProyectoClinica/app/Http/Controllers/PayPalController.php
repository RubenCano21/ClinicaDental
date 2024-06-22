<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    public function index(){
        return view('paypal');
    }

    public function createTransaction()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ],
            "application_context" => [
                "cancel_url" => route('cancelTransaction'),
                "return_url" => route('successTransaction'),
            ]
        ]);

        return redirect($order['links'][1]['href']);
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->capturePaymentOrder($request['token']);

        if ($response['status'] == 'COMPLETED') {
            // Aquí puedes manejar la lógica de éxito del pago, como guardar información en la base de datos
            return view('payment.success');
        }

        return view('payment.failure');
    }

    public function cancelTransaction()
    {
        return view('payment.cancel');
    }
}
