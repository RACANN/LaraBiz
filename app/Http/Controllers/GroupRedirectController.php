<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupRedirectController extends Controller
{
    public function redirectUserByGroup(){
        if(Auth::user()){
            $id = Auth::user()->group_id;
            switch ($id){
                case 1:
                    return view('/admin');
                    break;
                case 2:
                    return view('/ManagerPage');
                    break;
                case 3:
                    return view('/EmployeePage');
                    break;
                case 4:
                    return view('/NewUserPage');
                    break;
            }
        }else{
            redirect('/unauthorized');
        }

    }
}
