<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    function save($user) {
        $user->save();
    }

    function getAll() {
        return $this->userModel->all();
    }
    function find($id){
        return $this->userModel->find($id);
    }
    function delete($user){
        $user->delete();
    }
    function search($name){
        $customers = $this->userModel
            ->where('username','like',"%$name%")
            ->orwhere('email','like',"%$name%")
            ->orwhere('address','like',"%$name%")
            ->get();
        return $customers;
    }
}
