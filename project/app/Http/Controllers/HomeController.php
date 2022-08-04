<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
       return 'hello soniya';
    }
    public function index(){
        $users =User::all();
        echo "<th> Name</th>  ";
        echo "<th> Email</th>";
        foreach($users as $user){
            echo "<td>   " . $user->name . "  </td> <br> <br> <br> <br> ";
            echo " ";

            echo "<td>    " . $user->email . "  </td> ";
        }
        

    }
}
