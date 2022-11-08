<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use DB;

class StripeController extends Controller
{
    
    public function payment_stripe(Request $request)
    {
       
        if ($request->isMethod('GET')) {

            return view('stripe-home');

        }


        if ($request->isMethod('POST')) {

           
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => 100 * 150,
                    "currency" => "USD",
                    "source" => $request->stripeToken,
                    "description" => "Buy a ticket",
            ]);
            
            $compid = DB::table('company')->where('ownerid', Auth::user()->id)->first();
            $data = array('companyid'=>$compid->id);
            DB::table('payment')->insert($data);
            Session::flash('success', 'Payment has been successfully processed.');
              
            return back();

        }
    }
}