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

       return response()->json(['res'=>'Updated']);
    }

    public function delete($id){

        $address=Address::find($id);
        $address->delete();

        return response()->json(['res'=>'Deleted...']);

    }

    public function search(Request $request){
        if($request->ajax()){
            $data=Address::where('name','LIKE',$request->name.'%')->get();

            $output='';
            if(count($data)>0){
                $output = '<ul class="list-group" style="display:block;position:relative;">';

                    foreach($data as $row){
                        $output .='<li class="list-group-item">'.$row->name.'</li>';

                    }
                $output .='</ul>';

            }
            else{
                $output .='<li class="list-group-item">No Name Found</li>';
            }
            return $output;
        }
        
        return view('search');
    }

    public function filter(Request $request){
        $query=Address::query();
        if($request->ajax()){
            if(empty($request->name)){
                $users=$query->get();

            }
            else{
                $users=$query->where(['id'=>$request->name])->get();

            }
            
            return response()->json(['users'=>$users]);
        }
        $users=$query->get();
        return view('filter',compact('users'));
    }
    public function pagination(){
        $address=Address::paginate(5);
        return view('pagination',compact('address'));
    }
    public function fetch(Request $request){
        if($request->ajax()){
            $address=Address::paginate(5);
            return view('pagination1',compact('address'))->render();
        }
    }
}
