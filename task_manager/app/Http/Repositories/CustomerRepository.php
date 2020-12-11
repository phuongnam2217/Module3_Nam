<?php

namespace App\Http\Repositories;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    protected $customerModel;
    public function __construct(Customer $customer)
    {
        $this->customerModel = $customer;
    }
    public function getAll()
    {
        return $this->customerModel->all();
    }
    public function getById($id){
        return $this->customerModel->findOrFail($id);
    }
    public function create($customer,$roles = null)
    {
        DB::beginTransaction();
        try {
            $customer->save();
            $customer->roles()->sync($roles);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }
}
