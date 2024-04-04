<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\cuti;
use App\Models\jabatan;
use App\Models\jenis_cuti;
use App\Models\feedback;

use PDF;

class AdminController extends Controller
{
    //
	public function Home(){		
		$cutiselesai = cuti::where('status', 'diterima')->count();	
		$cutiditolak = cuti::where('status', 'ditolak')->count();		
		$totalusers = user::count();		
		return view('layouts.admin.home', compact('cutiselesai','cutiditolak','totalusers'));	
	} 
	
	public function tambahUser(){
		$jabatan = jabatan::all();
		return view('layouts.admin.tambahuser',compact ('jabatan'));		
	}    
    
	public function prosesTambahUser(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'foto' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
        ]);

            $nama_file = $request->foto;			
            $filefoto = time().rand(100,999).".".$nama_file->getClientOriginalName();		        
		
			$user = new user();
			$user->name = $request->input('name');
			$user->email = $request->input('email');
			$user->tempat_lahir = $request->input('tempat_lahir');
			$user->tgl_lahir = $request->input('tgl_lahir');
			$user->gender = $request->input('gender');
			$user->telp = $request->input('telp');
			$user->level = $request->input('level');
			$user->alamat = $request->input('alamat');
			$user->jabatan = $request->input('jabatan');
			$user->status_karyawan = $request->input('status_karyawan');
			$user->foto = $filefoto;
			$user->password = Hash::make($request->input('password'));
			$user->save();

            $nama_file->move(public_path().'/foto/', $filefoto);
			return redirect()->route('users.home')->with('success', 'Berhasil Menambah Data');				
		
	} 	
	
	public function userTampil(){
        $user = user::where('level','!=','admin')->with('foreign_jabatan')->get();
        return view('layouts.admin.tampiluser', compact('user'));		
   }    

    public function hapusUser($id){
    $hapususer = user::find($id);
    $hapususer->delete(); 		
    return redirect()->route('users.home')->with('success', 'Data Berhasil di hapus');
    }

    public function editUser($id)
    {
        //		
		$jabatan = jabatan::all();        
		$user = user::with('foreign_jabatan')->find($id);
		return view('layouts.admin.edituser', compact('jabatan','user'));						
    }    

    public function prosesupdateuser(Request $request, $id)
    {
        $ubh = user::findorfail($id);
		//$datapass = $ubh-.
        $data_awal = $ubh->foto;
         if ($request->foto == '')
         {
			if ($request->password == ''){
				$dt = [
					'name' => $request['name'],
					'email' => $request['email'],
					'tempat_lahir' => $request['tempat_lahir'],
					'tgl_lahir' => $request['tgl_lahir'],
					'gender' => $request['gender'],
					'telp' => $request['telp'],
					'level' => $request['level'],
					'alamat' => $request['alamat'],
					'jabatan' => $request['jabatan'],
					'status_karyawan' => $request['status_karyawan'],
				];	
				$ubh->update($dt);				
			}
			else{
				$dt = [
					'name' => $request['name'],
					'email' => $request['email'],
					'password' => Hash::make($request->input('password')),
					'tempat_lahir' => $request['tempat_lahir'],
					'tgl_lahir' => $request['tgl_lahir'],
					'gender' => $request['gender'],
					'telp' => $request['telp'],
					'level' => $request['level'],
					'alamat' => $request['alamat'],
					'jabatan' => $request['jabatan'],
					'status_karyawan' => $request['status_karyawan'],
				];	
				$ubh->update($dt);				
			}

            return redirect()->route('users.home')->with('success', 'Data Berhasil di ubah');	
         }
         else {
			
             $request->validate([
                 'foto' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
             ]);	
			
			if ($request->password == ''){
				$dt = [
					'name' => $request['name'],
					'email' => $request['email'],
					'tempat_lahir' => $request['tempat_lahir'],
					'tgl_lahir' => $request['tgl_lahir'],
					'gender' => $request['gender'],
					'telp' => $request['telp'],
					'level' => $request['level'],
					'alamat' => $request['alamat'],
					'jabatan' => $request['jabatan'],
					'status_karyawan' => $request['status_karyawan'],
					'foto' => $data_awal,
				];	
				$request->foto->move(public_path().'/foto/', $data_awal);
				$ubh->update($dt);			
			}
			else{
				$dt = [
					'name' => $request['name'],
					'email' => $request['email'],
					'password' => Hash::make($request->input('password')),
					'tempat_lahir' => $request['tempat_lahir'],
					'tgl_lahir' => $request['tgl_lahir'],
					'gender' => $request['gender'],
					'telp' => $request['telp'],
					'level' => $request['level'],
					'alamat' => $request['alamat'],
					'jabatan' => $request['jabatan'],
					'status_karyawan' => $request['status_karyawan'],
					'foto' => $data_awal,
				];	
				$request->foto->move(public_path().'/foto/', $data_awal);
				$ubh->update($dt);			
			}			 
            
            return redirect()->route('users.home')->with('success', 'Data Berhasil di ubah');				
         }
    }	
	
	public function tampiljabatan(){
		$jabatan = jabatan::all();
		return view('layouts.admin.tampiljabatan', compact('jabatan'));
	}	
	
	public function tambahjabatan(){
		return view('layouts.admin.tambahjabatan');
	}		
	
	public function prosestambahjabatan(Request $request){
			$jabatan = new jabatan();
			$jabatan->nama_jabatan = $request->input('nama_jabatan');
			$jabatan->save();
			return redirect()->route('jabatan.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editjabatan($id)
   {
       $jabatan = jabatan::find($id);
       return view('layouts.admin.editjabatan', compact('jabatan'));		
   }  	
	
   public function prosesupdatejabatan(Request $request, $id)
   {
       $ubh = jabatan::findorfail($id);
           $dt = [
               'nama_jabatan' => $request['nama_jabatan'],
           ];	
           $ubh->update($dt);
           return redirect()->route('jabatan.home')->with('success', 'Data Berhasil di ubah');	
   } 	
   
	public function hapusjabatan($id){
		$jabatan_artikel = jabatan::find($id);
		$jabatan_artikel->delete(); 		
		return redirect()->route('jabatan.home')->with('success', 'Data Berhasil di hapus');
	}	
	
	//
	
	public function tampiljenis_cuti(){
		$jenis_cuti = jenis_cuti::all();
		return view('layouts.admin.tampiljenis_cuti', compact('jenis_cuti'));
	}	
	
	public function tambahjenis_cuti(){
		return view('layouts.admin.tambahjenis_cuti');
	}		
	
	public function prosestambahjenis_cuti(Request $request){
			$jenis_cuti = new jenis_cuti();
			$jenis_cuti->jenis_cuti = $request->input('jenis_cuti');
			$jenis_cuti->save();
			return redirect()->route('jenis_cuti.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editjenis_cuti($id)
   {
       $jenis_cuti = jenis_cuti::find($id);
       return view('layouts.admin.editjenis_cuti', compact('jenis_cuti'));		
   }  	
	
   public function prosesupdatejenis_cuti(Request $request, $id)
   {
       $ubh = jenis_cuti::findorfail($id);
           $dt = [
               'jenis_cuti' => $request['jenis_cuti'],
           ];	
           $ubh->update($dt);
           return redirect()->route('jenis_cuti.home')->with('success', 'Data Berhasil di ubah');	
   } 	
   
	public function hapusjenis_cuti($id){
		$jenis_cuti = jenis_cuti::find($id);
		$jenis_cuti->delete(); 		
		return redirect()->route('jenis_cuti.home')->with('success', 'Data Berhasil di hapus');
	}	

    public function detailpegawai($id)
    {
        //		
		//$cuti = cuti::all();        
		$cuti = cuti::with('foreign_users')->with('foreign_jabatan')->with('foreign_jeniscuti')->find($id);
		$feedback = feedback::where('id_cuti', $id)->first();
		return view('layouts.admin.detailcuti', compact('cuti','feedback'));						
    } 	
	
	public function tampilpegawai_cuti(){
	//	$datauser_aktif = Auth::user()->id;
		$cuti = cuti::with('foreign_jeniscuti')->get();
		return view('layouts.admin.tampilcuti', compact('cuti'));
	}
	
    public function cetaksk($id)
    {
        //		
		//$cuti = cuti::all();        
	   $cuti = cuti::with('foreign_users')->with('foreign_jabatan')->with('foreign_jeniscuti')->find($id);
	   $pdf = PDF::loadview('layouts.skcuti.cetaksk', compact('cuti'))->setpaper('A4','potrait');
	   return $pdf->stream('SK-CUTI.pdf');						
    } 		
	
}
