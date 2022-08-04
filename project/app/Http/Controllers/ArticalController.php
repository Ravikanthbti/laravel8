<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artical;
use App\Models\Member;
use App\Models\Passport;
use Redirect;
use session;
use Intervention\Image\ImageManagerStatic as Image;


class ArticalController extends Controller
{
    public function addArtical(){
    
      return view('add1-artical');
    }

    public function sessioflush(Request $request){
        $request->session()->flush();
        return 'ok';

    }


    public function storeArtical(Request $request){

    	$aritcals = new Artical;
        $aritcals->name = $request->name;
        $aritcals->price=$request->price;
        $aritcals->description = $request->description;

    if($request->profile_image){
        $image = $request->profile_image;
        $filename = $image->getClientOriginalName();
        $storagePath='assets/upload/artical/'.$filename;
        Image::make($image)->save($storagePath);
        $aritcals->avatar= $filename;
        }
        $aritcals->save();
        return redirect()->back()->with('message','Product created successfully.');

    }
    public function showArtical(){
    
      	$data['articals'] = Artical::all();

        
    	return view('show-artical',$data);
            
    }

    public function editArtical($id){

        $data['artical']=Artical::find($id);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
     return view('edit-artical',$data);


    }

     public function updateArtical($id,Request $request){
        Artical::where('id',$id)
           ->update([
            'name'=> $request->name,
            'description'=>$request->description,
            'price'=>$request->price,
                      
            ]);
       
     return redirect('show-artical')->with('update successfully');


    }


    public function deleteArtical($id){

        $data=Artical::find($id);
        $data->delete();
        return redirect('show-artical')->with('delete successfully');


    }

public function addMember(){
    return view('add-member');


}
public function addPassport(){
    return view('add-passport');


}
  
   
   
   
    public function storeMember(Request $request){
        $member = new Member;
        $member->name = $request->name;
        $member->age = $request->age;
        $member->save();
        $lastid=$member->id;
        $pasport = new Passport;
        $pasport->pasname = $request->pasname;
        $pasport->member_id =$lastid;
    	$member->passport()->save($pasport);
        

    }
    public function storePassport(Request $request){

    	$aritcals = new Passport;
        $aritcals->pname = $request->pname;
        $aritcals->save();
        return redirect()->back()->with('success','Product created successfully.');

    }
}
