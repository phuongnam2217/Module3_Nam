<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{

    public function index(Request $request)
    {

        $books = User::latest()->get();

        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('book',compact('books'));
    }

    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'title' => 'required',
//            'author' => 'required',
//            'description' => 'required'
//        ]);
//        if($validator->passes()){
            User::updateOrCreate(['id' => $request->book_id],
                ['username' => $request->title, 'email' => $request->author,'address'=>$request->description,'phone'=>$request->phone]);

            return response()->json(['success'=>'Book saved successfully.']);
//        }
//        return response()->json(['error'=>$validator->errors()->messages()]);
    }

    public function edit($id)
    {
        $book = User::find($id);
        return response()->json($book);
    }


    public function destroy($id)
    {
        Book::find($id)->delete();
        return response()->json(['success'=>'Book deleted successfully.']);
    }
}
