<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    
    public function home(){
        return view('home');
    }
    public function create(){
        return view('create');
    }

    public function save(Request $request){
        //$customer=new Customer;
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        $name=request('name');
        $email=request('email');
        $phone=request('phone');
        $address=Address::Create([
            'email' => $email,
            'name' => $name,
            'phone'=>$phone,
        ]);

        return response()->json(['res'=>'Created']);
    }

    public function read(){
        //$data=User::where('name','=','name')->get();
        $data=Address::all();
        return response()->json(['data'=>$data]);
        //return view('show');
    }

    public function edit($id){
        $address=Address::find($id);
        return view('edit',compact('address'));
    }

    public function update(Request $request){
        $address=Address::find(request('id'));
        
        //$currentPage=request('page');
        //dd($page);
        $address->update([

            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            
        ]);

       // return response()->json(['res'=>'Updated']);
    }
}
