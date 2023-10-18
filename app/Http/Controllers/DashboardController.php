<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Rooms;
use App\Models\Transaksi;
use App\Models\Kategori;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard() {
        // $data = User::with('users')->get();
        $user = User::all();
        // $transaksi = Transaksi::all();
        // $tr = Transaksi::where('status','like','success');
        // $totalinvoicesuccess = $tr->count();
        // $totalTransaksi = $transaksi->count();
        $totalUser = $user->count();
        // $menu = Menu::all();
        // $totalMenu = $menu->count();
        return view("dasboard.dasboard", compact('totalUser'));   
    }
    public function cekin() {
        $term = 'cekin';
        $kamar = Rooms::where('status_kamar','LIKE','%'.$term.'%')
                      ->get();
        // $kamar = Rooms::all();
        return view("dasboard.cek-in", compact('kamar'));   
    }
    public function check_in(Request $request, $id) {
        $kamar = Rooms::findOrFail($id);
        $kamar->status_kamar = $request->status_kamar;    
        $kamar->update($request->all());
        // Session::flash('success','Kamu Telah Berhasil Check-In');
        // return redirect('cek-in');
        Session::flash('success','Kamu Telah Berhasil Check-In');
        return redirect('cek-in');
    }
    public function transakssi(Request $request){

        // $rooms = Rooms::find('id');
        // $rooms->status_kamar = $request->status_kamar;
        // $rooms->update();
        $request->validate([
            'id_karyawan'=>'required',
            'id_kamar'=>'required',
            'nama_pelangan'=>'required',
            'jenis_kelamin'=>'required',
            'cekin'=>'required',
            'cekout'=>'required',
            'metode_pembayaran'=>'required',
            'status_pembayaran'=>'required'
        ]);

        $transaksi = new Transaksi();
        $transaksi->id_karyawan = $request->id_karyawan;
        $transaksi->id_kamar = $request->id_kamar;
        $transaksi->nama_pelangan = $request->nama_pelangan;
        $transaksi->jenis_kelamin = $request->jenis_kelamin;
        $transaksi->cekin = $request->cekin;
        $transaksi->cekout = $request->cekout;
        $transaksi->metode_pembayaran = $request->metode_pembayaran;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        // $transaksi->status = $request->status;
        $transaksi->save();
        Session::flash('cekin');
        // Session::flash('success','Kamu Telah Berhasil Check-In');
        return redirect('cek-in');
    }
    public function cekout() {
        $term = 'cekout';
        $kamar = Rooms::where('status_kamar','LIKE','%'.$term.'%')
                      ->get();
        $transaksi = Transaksi::all();
        return view("dasboard.cek-out", compact('kamar','transaksi'));   
    }
    public function kategorii() {
        $kategori = Kategori::all();
        $user = User::all();
        return view("dasboard.kategori", compact('kategori','user'));   
    }
    public function update_kategori(Request $request, $id) {
        $kategori = Kategori::findOrFail($id);
        // $kategori->status = $request->status;
        $kategori->update($request->all());
        Session::flash('success','Kamu Telah Berhasil Update Status');
        return redirect('kategori');
    }
    public function hapus_kategori(Request $request, $id) {
        $kategori = Kategori::findOrFail($id);
        // $kategori->status = $request->status;
        $kategori->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data');
        return redirect('kategori');
    }
    public function tambah_kategori(Request $request) {
        $request->validate([
            'nama_kategori'=>'required|unique:kategori',
            'status'=>'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->status = $request->status;
        if ($kategori->save()) {
            Session::flash('success','Kamu Telah Berhasil Menambah Data Kategori');
            return redirect('kategori');
        } else {
            Session::flash('success','Kamu Tidak Berhasil Menambah Data Kategori');
            return redirect('kategori');
        }
    }
    public function kamarr() {
        $kamar = Rooms::all();
        $kategori = Kategori::all();
        return view("dasboard.kamar", compact('kamar','kategori'));   
    }

    public function tambah_kamarr(Request $request) {
        $request->validate([
            'nama_kamar'=>'required|unique:Rooms',
            'id_kategori'=>'required',
            'harga'=>'required',
            'status_kamar'=>'required',
            'status'=>'required'
        ]);

        $kamar = new Rooms();
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->id_kategori = $request->id_kategori;
        $kamar->harga = $request->harga;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->status = $request->status;
        $kamar->save();
        Session::flash('success','Kamu Telah Berhasil Menambah Data');
        return redirect('kamar');
    }

    public function hapus_kamar(Request $request, $id) {
        $kamar = Rooms::findOrFail($id);
        $kamar->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data Kamar');
        return redirect('kamar');
    }
    public function update_kamar(Request $request, $id) {
        $kamar = Rooms::findOrFail($id);
        // $kategori->status = $request->status;
        $kamar->update($request->all());
        Session::flash('success','Kamu Telah Berhasil Update Data Kamar');
        return redirect('kamar');
    }
    public function adminn() {
        $term = 'admin';
        $admin = User::where('role','LIKE','%'.$term.'%')
                      ->get();
        return view("dasboard.admin", compact('admin'));   
    }
    public function hapus_admin(Request $request, $id) {
        $user = User::findOrFail($id);
        // $kategori->status = $request->status;
        $user->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data Admin');
        return redirect('admin');
    }
    public function update_admin(Request $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        if ($request->updatepassword) $user->password = Hash::make($request->updatepassword);
        $user->status_akun = $request->status_akun;
        $user->role = $request->role;
        $user->update();
        Session::flash('success','Data Anda Berhasil Update');
        return redirect('admin');
    }
    public function tambah_admin(Request $request) {
        $request->validate([
            'username'=>'required|unique:Users',
            'nama_lengkap'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'email'=>'required|email|unique:Users',
            'nomor_tlp'=>'required|min:12|max:13',
            'password'=>'required|min:6|max:30',
            'role'=>'required',
            'status_akun'=>'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status_akun = $request->status_akun;
        $user->save();
        Session::flash('success','Kamu Telah Berhasil Menambah Admin');
        return redirect('admin');
    }
    public function managerr() {
        $term = 'manager';
        $manager = User::where('role','LIKE','%'.$term.'%')
                      ->get();
        return view("dasboard.manager", compact('manager'));   
    }
    public function hapus_manager(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data Manager');
        return redirect('manager');
    }
    public function update_manager(Request $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        if ($request->updatepassword) $user->password = Hash::make($request->updatepassword);
        $user->status_akun = $request->status_akun;
        $user->role = $request->role;
        $user->update();
        Session::flash('success','Data Anda Berhasil Update');
        return redirect('manager');
    }
    public function tambah_manager(Request $request) {
        $request->validate([
            'username'=>'required|unique:Users',
            'nama_lengkap'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'email'=>'required|email|unique:Users',
            'nomor_tlp'=>'required|min:12|max:13',
            'password'=>'required|min:6|max:30',
            'role'=>'required',
            'status_akun'=>'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status_akun = $request->status_akun;
        $user->save();
        Session::flash('success','Kamu Telah Berhasil Menambah Manager');
        return redirect('manager');
    }
    
    public function karyawann() {
        $term = 'karyawan';
        $karyawan = User::where('role','LIKE','%'.$term.'%')
                      ->get();
        return view("dasboard.karyawan", compact('karyawan'));   
    }
    public function hapus_karyawan(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data Karyawan');
        return redirect('karyawan');
    }
    public function update_karyawan(Request $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        if ($request->updatepassword) $user->password = Hash::make($request->updatepassword);
        $user->status_akun = $request->status_akun;
        $user->role = $request->role;
        $user->update();
        Session::flash('success','Data Anda Berhasil Update');
        return redirect('karyawan');
    }
    public function tambah_karyawan(Request $request) {
        $request->validate([
            'username'=>'required|unique:Users',
            'nama_lengkap'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'email'=>'required|email|unique:Users',
            'nomor_tlp'=>'required|min:12|max:13',
            'password'=>'required|min:6|max:30',
            'role'=>'required',
            'status_akun'=>'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status_akun = $request->status_akun;
        $user->save();
        Session::flash('success','Kamu Telah Berhasil Menambah Karyawan');
        return redirect('karyawan');
    }
    
    public function userr() {
        $term = 'user';
        $user = User::where('role','LIKE','%'.$term.'%')
                      ->get();
        return view("dasboard.user", compact('user'));   
    }
    public function hapus_user(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success','Kamu Telah Berhasil Hapus Data User');
        return redirect('user');
    }
    public function update_user(Request $request, $id){
        $user = User::find($id);
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        if ($request->updatepassword) $user->password = Hash::make($request->updatepassword);
        $user->status_akun = $request->status_akun;
        $user->role = $request->role;
        $user->update();
        Session::flash('success','Data Anda Berhasil Update');
        return redirect('user');
    }
    public function tambah_user(Request $request) {
        $request->validate([
            'username'=>'required|unique:Users',
            'nama_lengkap'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'email'=>'required|email|unique:Users',
            'nomor_tlp'=>'required|min:12|max:13',
            'password'=>'required|min:6|max:30',
            'role'=>'required',
            'status_akun'=>'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status_akun = $request->status_akun;
        $user->save();
        Session::flash('success','Kamu Telah Berhasil Menambah User');
        return redirect('user');
    }

    public function activity_log() {
        $users = User::all();
        //     if (Cache::has('user-is-online-' . $user->id))
        //         echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        //     else
        //         echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        // }
        return view("dasboard.activity", compact('users'));   
    }
    public function kalenderrr() {
        return view("dasboard.kalender");   
    } 
    public function laporann() {
        $transaksi = Transaksi::all();
        return view("dasboard.laporan", compact('transaksi'));   
    } 

    public function filterr(Request $request) {
        $start_date = $request->cekin;
        $end_date = $request->cekout;

        $transaksi = Transaksi::whereDate('cekin','>=',$start_date)->whereDate('cekout','<=',$end_date)->get();
        return view("dasboard.laporan", compact('transaksi'));
    }
    public function profilee() {
        $transaksi = Transaksi::all();
        return view("dasboard.profile", compact('transaksi'));   
    }
}
