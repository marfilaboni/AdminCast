<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserRole;
use App\User;
use Image;
use Session;
use Carbon\Carbon;
use DB;

class UserController extends Controller{
  public function __construct(){
     $this->middleware('auth');
     $this->middleware('superadmin');
  }
  public function index(){
    $allUser=User::orderBy('id','DESC')->get();
    return view('admin.user.all',compact('allUser'));
  }

  public function add(){
    $allRole=UserRole::where('role_status',1)->orderBy('role_id','ASC')->get();
    return view('admin.user.add',compact('allRole'));
  }

  public function view($id){
    $data=User::where('id',$id)->firstOrFail();
    return view('admin.user.view',compact('data'));
  }

  public function edit(){

  }

  public function insert(Request $request){
    $this->validate($request,[
      'name' => 'required|string|max:100',
      'email' => 'required|string|email|max:50|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'role' => 'required',
    ],[
      'name.required' => 'Please enter your name',
      'email.required' => 'Please enter your email',
      'password.required' => 'Please enter your password',
      'role.required' => 'Please enter your role name',
    ]);

    $insert=User::insert([
      'name'=>$request['name'],
      'phone'=>$request['phone'],
      'email'=>$request['email'],
      'user_role_id'=>$request['role'],
      'password'=>Hash::make($request['password']),
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($insert){
       Session::flash('success');
       return redirect('admin/user/add');
    }else {
      Session::flash('error');
      return redirect('admin/user/add');
    }
  }

}
