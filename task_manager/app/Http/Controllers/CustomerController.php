<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            [
                'id' => 1,
                'name' => 'Nam',
                'email' => 'nam@gmail.com',
                'address' => 'Hue'
            ],
            [
                'id' => 2,
                'name' => 'Tran',
                'email' => 'tran@gmail.com',
                'address' => 'Hanoi'
            ],
            [
                'id' => 3,
                'name' => 'Tung',
                'email' => 'tung@gmail.com',
                'address' => 'Saigon'
            ]
        ];
        return view('modules.customer.list',compact('customers'));
    }

    public function create()
    {
        return view('modules.customer.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        echo $id;
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
