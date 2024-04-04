<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'id_user',
        'id_jabatan',
        'id_jeniscuti',
        'mulai_cuti',
        'status',
        'akhir_cuti',
        'keterangan',
    ];		
	
    public function foreign_users()
    {
        return $this->belongsTo(user::class, 'id_user');
    }  	
	
    public function foreign_jabatan()
    {
        return $this->belongsTo(jabatan::class, 'id_jabatan');
    }  	

    public function foreign_jeniscuti()
    {
        return $this->belongsTo(jenis_cuti::class, 'id_jeniscuti');
    }  		
	
}
