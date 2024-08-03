<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewUsersForm(Request $request){
        $data = User::where('is_admin',false)
            ->when($request->search, function ($q) use ($request) {
                return $q->where('first_name', 'like', "%$request->search%")->orWhere('last_name', 'like', "%$request->search%");
            })
            ->get();
        return view('admin-pages.users',['data'=>$data]);
    }

    public function viewUser($id){
        $types = Type::all();
        $data = User::where('id',$id)->with('products.type','media')->first();
        return view('admin-pages.user-details',['data'=>$data]);
    }
}
