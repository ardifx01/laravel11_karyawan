<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Domisili;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function dashboard(){
        return view('v_login.dashboard',[
            'user'  => 'user'
        ]);
    }
    public function tables(){
        $dataKota = Domisili::get(['name']);
        $dataKaryawan = Karyawan::orderBy('created_at','desc')->get();
        return view('v_login.table', compact('dataKaryawan','dataKota'));
    }
    public function delete(string $primaryKey){
        $dataKaryawan = Karyawan::findOrFail($primaryKey);
        if ($dataKaryawan->foto) {
            $oldImagePath = public_path('storage/karyawan-img/') . $dataKaryawan->foto;
                if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                }
            }
            $dataKaryawan->delete();
        return redirect()->route('tables')->with('success');
    }
    public function edit(string $primaryKey){
    $karyawan = Karyawan::findOrFail($primaryKey);
    $dataKota = Domisili::get(['id','name']);
    return view('v_login.edit',[
        'dk' => $dataKota,
        'edit' => $karyawan
    ]);
    }
    public function update(Request $request, string $primaryKey){

        $rules = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'hp' => 'required',
            'domisili' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $karyawan = Karyawan::findOrFail($primaryKey);

        $karyawan->nama = $request->nama;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->hp = $request->hp;
        $karyawan->domisili = $request->domisili;

        if($request->hasFile('foto')){
            $dir = public_path('storage/karyawan-img/');
            $file = $request->file('foto');
            $filename = time() . $file->getClientOriginalName();
            $file->move($dir,$filename);
            if(!is_null($karyawan->foto)){
                $oldImagePath = public_path('storage/karyawan-img/'.$karyawan->foto);
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
            }
            $karyawan->foto = $filename;

        }
            $result = $karyawan->save();
            return redirect()->route('tables')->with('success', 'Data Berhasil Di Ubah');

    }
}
