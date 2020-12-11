<?php

namespace App\Http\Services;

use App\Http\Repositories\CustomerRepository;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository = $customerRepository;
    }
    public function getAll()
    {
        return $this->customerRepository->getAll();
    }
    public function getById($id){
        return $this->customerRepository->getById($id);
    }
    public function create($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $file = $request->images;
        $filename = $file->store('public');
        $customer->images = $filename;
        $roles = $request->roles;
        $this->customerRepository->create($customer,$roles);
    }
    public function update($id,$request)
    {
        $customer = $this->customerRepository->getById($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $roles = $request->roles;
        $this->customerRepository->create($customer,$roles);
    }

}
