<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use ConstDefaults;
use ConstGuards;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;


//iam here 
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = customer::all();
        return view('customers.index', ['customers' => $customers]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = customer::orderby('name')->get();
        return view('back.layout.forms.customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        try {
            customer::create($request->except('_token'));
            return to_route('customers.index')->with('status', 'new customer added');
        } catch (Exception $a) {
            return to_route('customers.index')->with('status', $a->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $customer->update($request->except('_token'));
            return to_route('customers.index')->with('status', 'customer updated');
        } catch (Exception $a) {
            return to_route('customers.index')->with('status', $a->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return to_route('customers.index')->with('status', 'customer deleted');
        } catch (Exception $a) {
            return to_route('customers.index')->with('status', $a->getMessage());
        }
    }

    public function gettotalcustomer(){
        $totalcustomers= Customer::count();
        return response()->json(['total'=>$totalcustomers]);
    }


    public function resetpassword(Request $request ,$token=null){

        $check_token = DB::table('password_reset_tokens')
        ->where(['token'=>$token,'guard'=>ConstGuards::CUSTOMER])
        ->first();


        if($check_token){
            //check if token is not expired
            $diffmins = Carbon::createfromformat('y-m-d H:i:s',$check_token->created_at)->diffInMinutes(Carbon::now());

            if($diffmins > ConstDefaults::tokenExpiredMinutes){
             session()->flash('fail','token expired');
             return redirect()->route('forget-password',['token'=>$token]);
            }else{
                return view('front.reset-password')->with(['token'=>$token]);
            }

        }else{
            session()->flash('fail','invalid token!');
            return redirect()->route('forget-password',['token'=>$token]);
        }
    }
}
