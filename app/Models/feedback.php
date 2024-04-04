<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
	
	public $table = "feedbacks";
	
    protected $fillable = [
        'id_cuti',
        'feedback_sekretaris',
        'feedback_pimpinan',
    ];		
	
    public function foreign_cuti()
    {
        return $this->belongsTo(cuti::class, 'id_cuti');
    }  	
	
}
