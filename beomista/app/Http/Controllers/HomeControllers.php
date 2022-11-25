<?php

namespace App\Http\Controllers;

use App\Models\hoadon;
use App\Models\KhachHang;
use App\Models\loaiSanpham;
use App\Models\sanpham;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use PhpParser\Node\Stmt\Echo_;

session_start();
class HomeControllers extends Controller
{
    public function index(){
        $sp = sanpham::orderBy('NGAYLAP', 'DESC')->Paginate(10);
        $sph = sanpham::orderBy('SLBAN','DESC')->Paginate(10);
        $count = sanpham::count();  
        if($count % 2 == 0){
            $sps = sanpham::all();
        }else{
            $sps = sanpham::Paginate($count-1);
        }
       
        
        $loai = loaiSanpham::all();
        return view('home', compact('loai','sp', 'sph', 'sps'));
    }
    public function category(){
        
        $sp = sanpham::Paginate(20);
        if($cate = request()->cate){
            $sp = sanpham::cate()->Paginate(20);
        }
        if(isset($_GET['min'])&& isset($_GET['max'])){
            $min = $_GET['min']-1;
            $max = $_GET['max']+1;
           $sp = sanpham::whereBetween('DONGIA',[$min,$max])->Paginate(20);
        }
        if(isset($_GET['sort_by'])){
            $sort = $_GET['sort_by'];
            if($sort=='tenA'){
                $sp = sanpham::orderBy('TENSP', 'ASC')->Paginate(20);
            }
            if($sort=='tenZ'){
                $sp = sanpham::orderBy('TENSP', 'DESC')->Paginate(20);
            }
            if($sort=='giaA'){
                $sp = sanpham::orderBy('DONGIA', 'DESC')->Paginate(20);
            }
            if($sort=='giaZ'){
                $sp = sanpham::orderBy('DONGIA', 'ASC')->Paginate(20);
            }
            if($sort=='sp'){
                $sp = sanpham::orderBy('NGAYLAP', 'DESC')->Paginate(20);
            }
        }
        if($key = request()->key){
            $sp = sanpham::search()->Paginate(20);
        }
        $loai = loaiSanpham::all();
        return view('page.sanpham', compact('sp','loai'));
    }
    public function details(Request $request, $id){
        $loai = loaiSanpham::all();
          $sp = sanpham::find($id);
        return view('page.chitiet', compact('loai', 'sp'));
    }
    public function cart()
    {
        $loai = loaiSanpham::all();
        return view('page.cart', compact('loai'));
    }
    public function addCart(Request $request)
    {
        $sp = sanpham::find($request->MASP);
        $data['id']= $sp->MASP;
        $data['qty']= $request->qty;
        $data['name']= $sp->TENSP;
        $data['price']= $sp->DONGIA;
        $data['weight']= $sp->DONGIA;
        $data['options']['image']= $sp->ANH;
        $s =Cart::add($data);
         return redirect()->route('home.cart');
        echo($sp);
    }
    public function delCart($id){
        Cart::remove($id);
      
        return redirect()->route('home.cart');
    }
   public function updateCart(Request $request)
   {
       $data = $request->data;
       foreach($data as $d){
           echo $d['key']."<br>";
           echo $d['value']."<br>";
           Cart::update($d['key'],$d['value']);
       }

   }
   public function showpayment()
   {
    $loai = loaiSanpham::all();
    return view('page.thanhtoan', compact('loai'));       
   }
   public function addBill(Request $request)
   {
       $cart = Cart::content();
       $today = date("Y-m-d");
        $kh = $request->MAKH;
        $t =  floatval( preg_replace( '#[^\d.]#', '', Cart::subtotal()) );
    DB::table('hoadon')->insert(['MAHD'=>null, 'MAKH'=>$kh, 'NGAYLAP'=> $today, 'TONGTIEN'=> $t, 'TINHTRANG'=>0,'CMT'=>'']);
    $last_id = DB::getPdo()->lastInsertId();
    // echo($last_id);
    foreach($cart as $d){
        $sub = $d->price * $d->qty;
        DB::table('chitiethoadon')->insert(['MACT'=>null, 'MAHD'=>$last_id, 'MASP'=>$d->id, 'SOLUONG'=>$d->qty,'DONGIA'=>$d->price,
                                            'THANHTIEN'=>$sub]);
          }
         
          return redirect()->route('home.cart')->with('successPay', 'Bạn đã đặt hàng thành công');
   }
   public function myBills()
   {
    $kh = session()->get('id');
    $hd = DB::table('hoadon')->where('MAKH',$kh)->get();
  
    $loai = loaiSanpham::all();
    return view('page.mybills', compact('loai','hd')); 
   }
   public function myDetails($id)
   {
       $ct = DB::table('chitiethoadon')->where('MAHD',$id)->get();
       $kh = session()->get('id');
        $hd = DB::table('hoadon')->where('MAHD',$id)->get();
        $total = $hd[0]->TONGTIEN;
       $loai = loaiSanpham::all();
       foreach($ct as $s){
        $sp = DB::table('sanpham')->where('MASP',$s->MASP)->get();
        $cthd[] = array(
            'THANHTIEN'=>$s->THANHTIEN,
            'DONGIA'=>$s->DONGIA,
            'SOLUONG'=>$s->SOLUONG,
            'ANHSP'=>$sp[0]->ANH,
            'TENSP'=>$sp[0]->TENSP,

        );
        
       }
     
    return view('page.details', compact('loai','cthd','total','id')); 
   }
   public function cancleBill(Request $request, $id)
   {
       $hd = hoadon::find($id);
       if($hd->TINHTRANG==1){
        DB::table('hoadon')->where('MAHD',$hd->MAHD)->update(['TINHTRANG'=>2, 'CMT'=>$request->CMT]);
         return redirect()->route('home.myBills')->with('success', 'Đã gửi yêu cầu hủy đơn, đang chờ xác nhận');
       }
       if($hd->TINHTRANG==0){
        $hd->delete();
        return redirect()->route('home.myBills')->with('success', 'Đã hủy đơn hàng thành công');
       }
   }
   public function doneBill($id)
   {
    $hd = hoadon::find($id);
    DB::table('hoadon')->where('MAHD',$hd->MAHD)->update(['TINHTRANG'=>4]);
    $ct = DB::table('chitiethoadon')->where('MAHD',$id)->get();
    foreach($ct as $c){
        $s = DB::table('sanpham')->where('MASP',$c->MASP)->get();
        DB::table('sanpham')->where('MASP',$c->MASP)->update(['SLBAN'=>$s[0]->SLBAN+$c->SOLUONG]);
    
    }
   
         return redirect()->route('home.myBills')->with('success', 'Cảm ơn bạn đã tin tưởng đặt hàng của shop');
   }
  
}
