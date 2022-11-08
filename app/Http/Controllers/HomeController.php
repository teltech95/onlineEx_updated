<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use DB;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function category(Request $request)
    {
        

        if ($request->isMethod('GET')) {
            
            $categories = DB::select("select * from category");

            return view('dash.category',[
                'categories'=>$categories
            ]);

        }


        if ($request->isMethod('POST')) {

            //dd($request);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:category,name|max:255',
                'theme_one' => 'required|max:10',
                'theme_two' => 'required|max:10',
            ]);
         
            if ($validator->fails()) {
                // For example:
                return redirect('category/')
                        ->withErrors($validator)
                        ->withInput();
         
                // Also handy: get the array with the errors
                //$validator->errors();
         
                // or, for APIs:
                //$validator->errors()->toJson();
            }else{
                $data=array('name'=>$request->input('name'),'theme_one'=>$request->input('theme_one'), 'theme_two'=>$request->input('theme_two'));
                DB::table('category')->insert($data);
                return redirect('category/')->with('status', 'Category added successfully');
            }
         
            // Input is valid, continue...

        }
    }

    public function category_detail(Request $request)
    {   
        $theme = DB::table('category')->where('id', $request->id)->first();
        //$companies = DB::select("select company.name as c_name, company.status, category.theme_one, category.theme_two from company join category on category.id = company.categoryid where categoryid = '$request->id'");
        $companies = DB::select("select * from company where categoryid = '$request->id'");
        
        //dd($companies);
        return view('dash.category_detail',[
            'companies'=>$companies,
            'theme'=>$theme
        ]);
    }

    public function register_company(Request $request)
    {
        

        if ($request->isMethod('GET')) {

            return view('dash.register_company');

        }


        if ($request->isMethod('POST')) {

            //dd(Auth::user()->id);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:company,name|max:255',
                'categoryid' => 'required|max:10',
                'location' => 'required|max:250',
            ]);
         
            if ($validator->fails()) {
                // For example:
                return redirect('register/company')
                        ->withErrors($validator)
                        ->withInput();
         
                // Also handy: get the array with the errors
                //$validator->errors();
         
                // or, for APIs:
                //$validator->errors()->toJson();
            }else{
                $data=array('ownerid'=>Auth::user()->id,'name'=>$request->input('name'),'categoryid'=>$request->input('categoryid'), 'location'=>$request->input('location'));
                DB::table('company')->insert($data);
                return redirect('register/company/')->with('status', 'Company Registered successfully');
            }
         
            // Input is valid, continue...

        }
    }

    public function company_detail(Request $request)
    {   
        $company = DB::table('company')->where('id', $request->id)->first();
        //$companies = DB::select("select company.name as c_name, company.status, category.theme_one, category.theme_two from company join category on category.id = company.categoryid where categoryid = '$request->id'");
        $products = DB::select("select * from product where companyid = '$request->id'");
        
        //dd($companies);
        return view('dash.company_detail',[
            'company'=>$company,
            'products'=>$products
        ]);
    }

    public function add_prodct(Request $request)
    {
        

        if ($request->isMethod('GET')) {

            return view('dash.add_prodct');

        }


        if ($request->isMethod('POST')) {

            //dd($request);
            $validator = Validator::make($request->all(), [
                'product_name' => 'required|min:2|max:255',
                'description' => 'required|max:250',
                'image_one' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
         
            if ($validator->fails()) {
                // For example:
                return redirect("add/prodct/$request->compid")
                        ->withErrors($validator)
                        ->withInput();
         
                // Also handy: get the array with the errors
                //$validator->errors();
         
                // or, for APIs:
                //$validator->errors()->toJson();
            }else{
                
                $imageName1 = time().'.'.$request->image_one->extension();
                
                // Public Folder
                $request->image_one->move(public_path('media'), $imageName1);
                

                // //Store in Storage Folder
                // $request->image->storeAs('images', $imageName);

                // // Store in S3
                // $request->image->storeAs('images', $imageName, 's3');

                //Store IMage in DB 

                $data=array('companyid'=>$request->input('compid'), 'product_name'=>$request->input('product_name'),'description'=>$request->input('description'), 'image_one'=>$imageName1);
                DB::table('product')->insert($data);
                return redirect("add/prodct/$request->companyid")->with('status','Product added successfully');
            }
         
            // Input is valid, continue...

        }
    }


    public function product_gallery(Request $request)
    {   
        //
        $company = DB::table('company')->where('ownerid', Auth::user()->id)->first();
        if($company)
        {
            $products = DB::select("select * from product where companyid = '$company->id'");  
            return view('dash.product_gallery',[
                'company'=>$company,
                'products'=>$products
            ]);  
        }else{
            $products = null;
            return redirect('/register/company')->with('register','Register your company first');
        }

        
    }

    public function delete_product(Request $request)
    {
        //dd($request->productid);
        DB::table('product')->where('id', $request->productid)->delete();
        return redirect('/product/gallery')->with('msg', 'Product deleted successfully');
    }

    public function payment(Request $request)
    {   
        //
        if ($request->isMethod('GET')) {

            $company = DB::table('company')->where('ownerid', Auth::user()->id)->first();
            if($company)
            {
                return view('stripe-home'); 
            }else{
                $products = null;
                return redirect('/register/company')->with('register','Register your company first');
            }
            

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
            DB::table('company')->where('id',$compid->id)->update(array('status' => 1));
            Session::flash('success', 'Payment has been successfully processed.');
              
            return back();

        }

    }

    public function vote(Request $request)
    {
        

        if ($request->isMethod('GET')) {
            
        
            $companies = DB::select("select * from company where status = 1");
            return view('dash.vote',[
                'companies' => $companies
            ]);

        }


        if ($request->isMethod('POST')) {

            //dd($request->input('user_id'));
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'comp_id' => 'required',
                'vote' => 'required',

            ]);
         
            if ($validator->fails()) {
                // For example:
                return redirect('/vote')
                        ->withErrors($validator)
                        ->withInput();
            }else{

                $pre_check = DB::table('vote')->where('user_id', Auth::user()->id)->first();
                if($pre_check){
                    DB::table('vote')->where('user_id', Auth::user()->id)->delete();
                    return redirect('/vote')->with('retweet', 'Vote removed');
                }
                $data=array('user_id'=>Auth::user()->id,'comp_id'=>$request->input('comp_id'),'vote'=>$request->input('vote'));
                DB::table('vote')->insert($data);
                return redirect('/vote')->with('tweet', 'Vote Added');
            }
         
            // Input is valid, continue...
       
            }
    }

    public function user_management(Request $request)
    {   
        //
        
        $users = DB::select("select * from users");

        return view('dash.users_management',[
            'users'=>$users,
        ]);
    }

    public function change_role(Request $request)
    {
        //dd($request->productid);
        $new_role = 0;
        $user_role = $request->roleid;
        
        if($user_role === "1")
        {
            $new_role = 2;
        }elseif($user_role === "2")
        {
            //dd($user_role);
            $new_role = 1;
        }else{
            $new_role = $request->roleid;
        }

        DB::table('users')
              ->where('id', $request->userid)
              ->update(['role' => $new_role]);

        return redirect('/user_management')->with('status', 'Role updated successfully');
    }

    public function hhh(Request $request)
    {   
        //
        
       
        return view('dash.vote',[]);
    }

    public function save_comment(Request $request)
    {   
        //
        
       
        $validator = Validator::make($request->all(), [
            
            'comp_id' => 'required',
            'comment' => 'required',

        ]);
     
        if ($validator->fails()) {
            // For example:
            return redirect('/vote')
                    ->withErrors($validator)
                    ->withInput();
        }else{

            $data=array('user_id'=>Auth::user()->id,'comp_id'=>$request->input('comp_id'),'comment'=>$request->input('comment'));
            DB::table('comments')->insert($data);
            return redirect('/vote')->with('comment', 'Comment submitted successfully');
        }

    }

    public function winner(Request $request)
    {   
        //
        $winners = DB::select("SELECT comp_id, SUM(vote) as totals FROM vote GROUP BY comp_id ORDER BY totals DESC");
        //dd($winners);
        return view('dash.winner',[
            'winners' => $winners
        ]);
    }

}


