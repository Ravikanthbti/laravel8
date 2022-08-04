<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use response;
use Intervention\Image\ImageManagerStatic as Image;


class CustomerController extends Controller
{
    public function gestcustomer(){
        
        $data['posts'] = Customer::all();
        return view('getcustomer',$data);
    }

    public function storecustomer(Request $request){
        $customer = new Customer;
        $customer->firstName=$request->firstName;
        $customer->lastName=$request->lastName;
        $customer->info=$request->info;
        
         if($request->profile_image){
        $image = $request->profile_image;
        $filename = $image->getClientOriginalName();
        $storagePath='assets/upload/artical/'.$filename;
        Image::make($image)->save($storagePath);
        $customer->avatar= $filename;
        }
        $customer->save();

                                                                                  
        return response()->json(['success'=>'Added new records.']);

             

    }

    public function list(){
        
        $posts= Customer::all();
        return response()->json($posts, 200);

    }

    
}
