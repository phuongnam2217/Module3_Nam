<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\UserService;
class TaskController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $customers = $this->userService->getAll();
        return  view('admin.users.list',['customers'=>$customers]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
            'password'=>['required',
                'min:6'
                ],
            'email'=>'required | email | unique:App\Models\User,email'
        ]);
        $this->userService->create($request);
        return redirect()->route('users.index');
    }
    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}
