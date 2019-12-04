<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Users;
use Hash;

class LoginController extends Controller
{
    public function getLogin()
    {  
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	$arr = ['full_name'=>$request->full_name, 'password'=>$request->password];
    	if(Auth::attempt($arr))
        {
    		return redirect()->intended('admin/home');
    	}
        else
        {
    		return back()->with('error', 'Tài khoản hoặc mật khẩu không đúng vui lòng đăng nhập lại!');
    	}
    }

     public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function getResetpassword($id){
        $data['reset'] = Users::find($id);
        return view('admin/resetpassword',$data);
    }

    public function postResetpassword(Request $request,$id){
        $user = Users::find($id);
        if(Hash::check($request->matkhaucu,$user->password))
        { 
            if($request->matkhaumoi == $request->xacnhanmatkhau)
            {
                if ($request->email == $user->email) 
                {
                    $user->password = bcrypt($request->matkhaumoi);
                    $user->save();
                    return redirect()->intended('login')->with('error_thanhcong','Đổi mật khẩu thành công vui lòng đăng nhập lại!');
                }
                return redirect()->back()->with('error','Email không đúng!');
            }
            return redirect()->back()->with('error','Xác nhận mật khẩu không đúng!');
        }
        return redirect()->back()->with('error','Mật khẩu củ không đúng
            !');
    }
}
