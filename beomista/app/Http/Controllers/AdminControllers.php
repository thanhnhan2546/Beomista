<?php

namespace App\Http\Controllers;

use App\Models\hoadon;
use App\Models\khachhang;
use App\Models\kho;
use App\Models\loaiSanpham;
use App\Models\nhacungcap;
use App\Models\nhanvien;
use App\Models\sanpham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

session_start();
class AdminControllers extends Controller
{
    public function index()
    {
        return view('admin.dasboard');
    }
    public function showLogin()
    {
        return view('admin.login');
    }
    public function chekLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'passwd' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $remember = $request->remember;

        if (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN' => 'admin'])) {
            session()->put('tendn', $request->user);
            session()->put('quyen', 'admin');
            return redirect()->route('admin.index');
            //dd($user_email = auth()->user()->QUYEN);
        } elseif (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN' => 'ql'])) {
            session()->put('tendn', $request->user);
            session()->put('quyen', 'ql');
            return redirect()->route('admin.index');
            //dd($user_email = auth()->user()->QUYEN);
        } elseif (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN' => 'nv'])) {
            session()->put('tendn', $request->user);
            session()->put('quyen', 'nv');
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('errorspw', 'Sai thông tin đăng nhập');
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            session()->forget('quyen');
            session()->forget('tendn');
            return redirect()->route('admin.showLogin');
        }
    }
    public function thongke()
    {
        $SP = sanpham::all();
        $sl_ban = 0;
        foreach ($SP as $s) {
            $sl_ban = $s->SLBAN + $sl_ban;
        }
        $thd = hoadon::all();
        $today = date('Y-m-d');
        $date = date_create($today);
        date_modify($date, "-7 days");
        $today2 = date('Y-m');
        $date2 = date_create($today);
        date_modify($date2, "-1 months");
        $today3 = date('Y');
        $date3 = date_create($today);
        date_modify($date3, "-1 years");
        $HD_N = 0;
        $HD_N2 = 0;
        $HD_N3 = 0;
        $HD_N4 = 0;
        foreach ($thd as $h) {
            if (strtotime($today) == strtotime($h->NGAYLAP)) {
                $HD_N++;
            }
            if (strtotime($today) >= strtotime($h->NGAYLAP) && strtotime(date_format($date, 'Y-m-d')) <= strtotime($h->NGAYLAP)) {
                $HD_N2++;
            }
            if (strtotime($today) >= strtotime($h->NGAYLAP) && strtotime(date_format($date2, 'Y-m-d')) <= strtotime($h->NGAYLAP)) {
                $HD_N3++;
            }
            if (strtotime($today) >= strtotime($h->NGAYLAP) && strtotime(date_format($date3, 'Y-m-d')) <= strtotime($h->NGAYLAP)) {
                $HD_N4++;
            }
        }
        $sp = sanpham::count();
        $kh = khachhang::count();
        $lsp = loaiSanpham::count();
        $tkho = kho::all();
        $kho = 0;
        foreach ($tkho as $k) {
            $kho = $k->SLCON + $kho;
        }
        $tk = User::count();
        $ncc = nhacungcap::count();
        $nv = nhanvien::count();
        $hd = hoadon::count();
        $data = ([
            'sp' => $sp,
            'kh' => $kh,
            'lsp' => $lsp,
            'kho' => $kho,
            'ncc' => $ncc,
            'nv' => $nv,
            'hd' => $hd,
            'tk' => $tk,
            'slban' => $sl_ban,
            'hd_n' => $HD_N,
            'hd_n2' => $HD_N2,
            'hd_n3' => $HD_N3,
            'hd_n4' => $HD_N4,
        ]);
        return view('admin.thongke', compact('data'));
    }
    public function loc(Request $request)

    {
        $count_total = 0;
        $subtotal =0;
        $date1 = date_create($request->ngaydau);
        date_modify($date1, "-1 days");
        $date2 = date_create($request->ngaycuoi);
        date_modify($date2, "+1 days");
        $hd = DB::table('hoadon')->whereBetween('NGAYLAP', [$date1, $date2])->get();
        foreach ($hd as $key => $val) {

            $lap[] = $val->NGAYLAP;
            $subtotal += $val->TONGTIEN;
            $sub[] = $subtotal;
        }
        $sub_total = array_pop($sub);
        $ngaylap = array_unique($lap);
        

        $i = 0;
        foreach ($ngaylap as $val) {
            $count = DB::table('hoadon')->where('NGAYLAP', $val)->count();
            $total = DB::table('hoadon')->where('NGAYLAP', $val)->get();
            foreach ($total as $t) {
                $count_total += $t->TONGTIEN;
            }
            $chart[] = array(
                'period' => $val,
                'total' => $count_total,
                'count' => $count,
                'subtotal'=>$sub_total


            );

            $count_total = 0;
        }


        echo $data = json_encode($chart);
    }
    public function dt_Tuan()
    {
        if (!isset($_GET['sort'])) {
            $count_total = 0;
            $subtotal = 0;
            $today = date('Y-m-d');
            $date1 = date_create($today);
            date_modify($date1, "-8 days");
            $date2 = date_create($today);
            date_modify($date2, "+1 days");
            $hd = DB::table('hoadon')->whereBetween('NGAYLAP', [$date1, $date2])->where('TINHTRANG', 3)->get();
            foreach ($hd as $key => $val) {

                $lap[] = $val->NGAYLAP;
                $subtotal += $val->TONGTIEN;
                $sub[] = $subtotal;
            }
            $sub_total = array_pop($sub);
            $ngaylap = array_unique($lap);

            $i = 0;
            foreach ($ngaylap as $val) {
                $count = DB::table('hoadon')->where('NGAYLAP', $val)->count();
                $total = DB::table('hoadon')->where('NGAYLAP', $val)->get();
                foreach ($total as $t) {
                    $count_total += $t->TONGTIEN;
                }

                $chart[] = array(
                    'period' => $val,
                    'total' => $count_total,
                    'subtotal' => $sub_total,


                );

                $count_total = 0;
            }


            echo $data = json_encode($chart);
        }
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == 'tuan') {
                $count_total = 0;
                $subtotal = 0;
                $today = date('Y-m-d');
                $date1 = date_create($today);
                date_modify($date1, "-8 days");
                $date2 = date_create($today);
                date_modify($date2, "+1 days");
                $hd = DB::table('hoadon')->whereBetween('NGAYLAP', [$date1, $date2])->where('TINHTRANG', 3)->get();
                foreach ($hd as $key => $val) {

                    $lap[] = $val->NGAYLAP;
                    $subtotal += $val->TONGTIEN;
                    $sub[] = $subtotal;
                }
                $sub_total = array_pop($sub);
                $ngaylap = array_unique($lap);

                $i = 0;
                foreach ($ngaylap as $val) {
                    $count = DB::table('hoadon')->where('NGAYLAP', $val)->count();
                    $total = DB::table('hoadon')->where('NGAYLAP', $val)->get();
                    foreach ($total as $t) {
                        $count_total += $t->TONGTIEN;
                    }

                    $chart[] = array(
                        'period' => $val,
                        'total' => $count_total,
                        'subtotal' => $sub_total,


                    );

                    $count_total = 0;
                }


                echo $data = json_encode($chart);
            }
            if ($sort == 'thang') {
                $count_total = 0;
                $subtotal = 0;
                $today = date('Y-m-d');
                $date1 = date_create($today);
                date_modify($date1, "-1 months");
                $date2 = date_create($today);
                date_modify($date2, "+1 days");
                $hd = DB::table('hoadon')->whereBetween('NGAYLAP', [$date1, $date2])->where('TINHTRANG', 3)->get();
                foreach ($hd as $key => $val) {

                    $lap[] = $val->NGAYLAP;
                    $subtotal += $val->TONGTIEN;
                    $sub[] = $subtotal;
                }
                $sub_total = array_pop($sub);
                $ngaylap = array_unique($lap);

                $i = 0;
                foreach ($ngaylap as $val) {
                    $count = DB::table('hoadon')->where('NGAYLAP', $val)->count();
                    $total = DB::table('hoadon')->where('NGAYLAP', $val)->get();
                    foreach ($total as $t) {
                        $count_total += $t->TONGTIEN;
                    }

                    $chart[] = array(
                        'period' => $val,
                        'total' => $count_total,
                        'subtotal' => $sub_total,


                    );

                    $count_total = 0;
                }


                echo $data = json_encode($chart);
            }
            if ($sort == 'nam') {
                $count_total = 0;
                $subtotal = 0;
                $today = date('Y-m-d');
                $date1 = date_create($today);
                date_modify($date1, "-1 years");
                $date2 = date_create($today);
                date_modify($date2, "+1 days");
                $hd = DB::table('hoadon')->whereBetween('NGAYLAP', [$date1, $date2])->where('TINHTRANG', 3)->get();
                foreach ($hd as $key => $val) {

                    $lap[] = $val->NGAYLAP;
                    $subtotal += $val->TONGTIEN;
                    $sub[] = $subtotal;
                }
                $sub_total = array_pop($sub);
                $ngaylap = array_unique($lap);

                $i = 0;
                foreach ($ngaylap as $val) {
                    $count = DB::table('hoadon')->where('NGAYLAP', $val)->count();
                    $total = DB::table('hoadon')->where('NGAYLAP', $val)->get();
                    foreach ($total as $t) {
                        $count_total += $t->TONGTIEN;
                    }

                    $chart[] = array(
                        'period' => $val,
                        'total' => $count_total,
                        'subtotal' => $sub_total,


                    );

                    $count_total = 0;
                }


                echo $data = json_encode($chart);
            }
        }
    }
}
