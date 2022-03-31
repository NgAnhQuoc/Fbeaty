<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLogin;
use App\Repositories\CoSo\CoSoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapAdminController extends Controller
{
    private $CoSo;
    public function __construct(CoSoRepository $CoSo)
    {
        $this->CoSo = $CoSo;

    }
    public function index(){

        $coSo = $this->CoSo->getAll();
        return view('Admin.login',compact('coSo'));
    }

    public function checkin(CheckLogin $request)
    {

        $request->session()->put('coso', $request->coso);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('quantri/');
        } else {
            return redirect('/quantri/login')->with('thongbao', 'Tài khoản và mật khẩu không đúng');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/quantri/login');
    }

}
