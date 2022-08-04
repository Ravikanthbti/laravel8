<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;

class PassportAuthController extends Controller
{
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [

        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        //'phone' => ['required','numeric'],
        //'profile_image.*' => ['mimes:jpeg,png,jpg|max:2048'],
                  
         ]);
        
        if ($validator->fails()) {

             return response()->json(['response' =>"error",'message'=>$validator->errors()], 200);
        }


            $user=new User;
            $user->name=$request->name;
           // $user->phone=$request->phone;
            $user->email=$request->email;
            $user->password = Hash::make($request->password);
            $user->remember_token = $request->_token;

            // $image = $request->profile_image;
            // $filename = $image->getClientOriginalName();
            // $storagePath='assets/upload/user/'.$filename;
            // Image::make($image)->save($storagePath);
            // $user->profile_image= $filename;
            $user->save();
            return response()->json(['response'=>'Success','message'=> $user->name. ' '.' Registered successfully!!',$user], 200);
    }

public function login(Request $request){
   
        $credentials = [
                        'email' => $request->email,
                        'password' => $request->password
                        ];
           

                    if (Auth::attempt($credentials)) {
                        return response()->json(['response'=>'Success','message'=>'Logged in successfully!!',"user"=>auth()->user()], 200);
                        } 

                    else{
                        return response()->json(['response'=>'error','message'=>'Invalid email or password'], 200);
                        }
        }

        public function userList() {
            
            $user= User::all();
            return response()->json(['response'=>'success','message'=>'data list',$user], 200);
    
            }
}
