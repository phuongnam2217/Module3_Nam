<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function create($request) {
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $this->userRepository->save($user);
    }

    function getAll() {
        return $this->userRepository->getAll();
    }
    function findById($id){
        return $this->userRepository->find($id);
    }
    function update($user , $request){
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $this->userRepository->save($user);
    }
    function delete($user){
        $this->userRepository->delete($user);
        return redirect()->route('users.index');
    }
    function search($request){
        $name = $request->search;

        return $this->userRepository->search($name);
    }
}
