<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use App\Banner;
use Carbon\Carbon;
use Session;
use Image;

class BannerController extends Controller{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function index(){
     $allBanner=Banner::where('ban_status',1)->orderBy('ban_id','DESC')->get();
     return view('admin.banner.all',compact('allBanner'));
  }

  public function add(){
     return view('admin.banner.add');
  }

  public function edit($slug){
     $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
     return view('admin.banner.edit',compact('data'));
  }

  public function view($slug){
     $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
     return view('admin.banner.view',compact('data'));
  }

  public function insert(Request $request){
        $this->validate($request,[
           'title'=>'required|min:5',
           'btn'=>'required',
        ],[
           'title.required'=>'Please enter your banner title!',
           'title.min'=>'Banner title must be 5 characters!',
           'btn.required'=>'Please enter your banner button!',
        ]);
        $slug = Str::slug($request['title'], '-');
        $insert=Banner::insertGetId([
       'ban_title'=>$_POST['title'],
       'ban_subtitle'=>$_POST['title'],
       'ban_button'=>$_POST['btn'],
       'ban_url'=>$_POST['url'],
       'ban_photo'=>'',
       'created_at'=>Carbon::now()->toDateTimeString(),
       'ban_slug'=>$slug,
     ]);
    if($request->hasFile('pic')){
       $image=$request->file('pic');
       $imageName='banner_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(300,300)->save('uploads/'.$imageName);

       Banner::where('ban_id',$insert)->update([
         'ban_photo'=>$imageName,
         'updated_at'=>Carbon::now()->toDateTimeString(),
       ]);
    }
    if($insert){
        Session::flash('success','value');
        return redirect('admin/banner/add');
    }else {
        Session::flash('error','value');
        return redirect('admin/banner/add');
    }

  }

  public function update(Request $request){
        $this->validate($request,[
            'title'=>'required|min:5|',
            'btn'=>'required',
        ],[
            'title.required'=>'Please enter banner title!',
            'title.min'=>'Banner title must be at least 5 characters.!',
            'btn.required'=>"Please enter button name!"
        ]);

        $id=$request['id'];
        $slug=$request['slug'];

        $update=Banner::where('ban_id',$id)->update([
          'ban_title'=>$_POST['title'],
          'ban_subtitle'=>$_POST['subtitle'],
          'ban_button'=>$_POST['btn'],
          'ban_url'=>$_POST['url'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='banner_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('uploads/'.$imageName);

          Banner::where('ban_id',$id)->update([
              'ban_photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('admin/banner/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/banner/edit/'.$slug);
        }
      }

      public function softdelete(){
        $id=$_POST['id'];

        $del=Banner::where('ban_id',$id)->where('ban_status',1)->update([
              'ban_status'=>0,
        ]);

        if($del){
            Session::flash('success','value');
            return redirect('admin/banner');
        }else{
            Session::flash('error','value');
            return redirect('admin/banner');
        }
      }

}
