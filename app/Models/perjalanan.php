<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perjalanan extends Model
{
    protected $table = 'perjalanan';
    protected $fillable = ['kota_id','suhu_tubuh','jam','tanggal','lokasi','user_id'];

    public function user(){
            return $this->belongsTo(User::Class);        
    }
    
}
