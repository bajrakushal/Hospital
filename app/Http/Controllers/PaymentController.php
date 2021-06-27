<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    public function index(){
        return view('Patient.Payment.cancel');
    }
}
