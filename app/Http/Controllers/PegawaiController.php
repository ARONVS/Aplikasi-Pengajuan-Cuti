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

class PegawaiController extends Controller
{
    //
	public function Home(){		
		$datauser_aktif = Auth::user()->id;
		$cutiselesai = cuti::where('id_user',$datauser_aktif)->where('status', 'diterima')->count();	
		$cutiditolak = cuti::where('id_user',$datauser_aktif)->where('status', 'ditolak')->count();		
		$totalcuti = cuti::where('id_user',$datauser_aktif)->count();		
		//$totalusers = user::count();		
		return view('layouts.pegawai.home', compact('cutiselesai','cutiditolak','totalcuti'));	
	} 	
	
    public function updateprofil (Request $request, $id)
    {
        $ubh = user::findorfail($id);
		
            $dt = [
                'password' =>Hash::make($request->input('password')),
            ];	
			
            $ubh->update($dt);
            return redirect()->route('pegawai.home')->with('success', 'Data Berhasil di ubah');				

    }		
	
	public function tampilpegawai_cuti(){
		$datauser_aktif = Auth::user()->id;
		$cuti = cuti::where('id_user',$datauser_aktif)->with('foreign_jeniscuti')->get();
		return view('layouts.pegawai.tampilcuti', compact('cuti'));
	}	
	
	public function tambahpegawai_cuti(){
		$jabatan = jabatan::all();
		$jenis_cuti = jenis_cuti::all();
		return view('layouts.pegawai.tambahcuti', compact('jabatan','jenis_cuti'));
	}	
	
	public function prosestambahcuti(Request $request){

			$datauser_aktif = Auth::user()->id;
		
			$cuti = new cuti();
			$cuti->id_user = $datauser_aktif;
			$cuti->id_jabatan = $request->input('id_jabatan');
			$cuti->id_jeniscuti = $request->input('id_jeniscuti');
			$cuti->mulai_cuti = $request->input('mulai_cuti');
			$cuti->akhir_cuti = $request->input('akhir_cuti');
			$cuti->keterangan = $request->input('keterangan');
			$cuti->status = 'diajukan';
			$cuti->save();
			
			$feedback = new feedback();
			$feedback->id_cuti = $cuti->id;
			$feedback->save();			

			return redirect()->route('pegawai_cuti.home')->with('success', 'Berhasil Menambah Data');				
		
	} 	
	
    public function detailpegawai($id)
    {
        //		
		//$cuti = cuti::all();        
		$cuti = cuti::with('foreign_users')->with('foreign_jabatan')->with('foreign_jeniscuti')->find($id);
		$feedback = feedback::where('id_cuti', $id)->first();
		return view('layouts.pegawai.detailcuti', compact('cuti','feedback'));						
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
