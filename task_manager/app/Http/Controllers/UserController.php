<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return  view('admin.users.list',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->userService->create($request);
        return redirect()->route('users.index');
    }
    public function show($id)
    {
        $user = $this->userService->findById($id);
        return view('admin.users.detail',compact('user'));
    }
    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->findById($id);
        $this->userService->update($user,$request);
        return redirect('/admin/users');
    }
    public function destroy($id)
    {
        $user = $this->userService->findById($id);
        $this->userService->delete($user);

    }
    public function search(Request $request){
       $users = $this->userService->search($request);
       $search = $request->search;
       return view('admin.users.list',compact('users','search'));
    }

}
