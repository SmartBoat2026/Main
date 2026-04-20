<?php

namespace App\Http\Controllers\User\SmartWallet;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class CompanyPaymentController extends Controller
{
    public function companyPayment()
    {    
        return view('member.smartwallet.companyPayment');
    }
    
}
