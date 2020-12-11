<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Services\CustomerService;
use App\Models\Customer;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('admin.customers.list',compact('customers'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.customers.create',compact('roles'));
    }
    public function store(Request $request)
    {
        dd($request->roles);
//        $this->customerService->create($request);
        return redirect()->route('customers.index')->with("customer_added",'Add Customer successfully');
    }
    public function show($id){

    }
    public function edit($id){
        $customer = $this->customerService->getById($id);
        $roles = Role::all();
        return view('admin.customers.edit',compact('customer','roles'));
    }
    public function update($id,Request $request)
    {
        $this->customerService->update($id,$request);
        return redirect()->route('customers.index')->with("customer_edit",'Edit Customer successfully');
    }
    public function delete($id){
        $role_user = DB::table('role_customer')->where('customer_id',$id)->get();
        if(count($role_user)){
            return back()->with('error','You have to delete role customers first');
        }else{
            Customer::where('id',$id)->delete();
            return redirect()->route('customers.index')->with('success','Delete success');
        }
    }
}
