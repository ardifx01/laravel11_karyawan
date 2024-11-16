<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Domisili;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class IndexController extends Controller
{
    public function index(){
        $dataKota = Domisili::get();
        $dataUser = Karyawan::get(['id_karyawan','nama']);

        return view('index',compact('dataKota', 'dataUser'));
    }
    public function listData(){
        $dataKota = Domisili::get('name');
        $dataUser = Karyawan::orderBy('created_at','desc')->get();
        return view('table',compact('dataUser','dataKota'));
    }
    public function input(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'hp' => 'required',
            'domisili' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $filePath = public_path('/storage/karyawan-img');
        $karyawan = new Karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->hp = $request->hp;
        $karyawan->domisili = $request->domisili;

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $fileName = time() . $request->file('foto')->getClientOriginalName();

            $file->move($filePath,$fileName);
            $karyawan->foto = $fileName;
        }
            $karyawan->save();
            Alert::success('Done','Data Berhasil Di tambahkan');
            return redirect()->route('index');
    }
}
