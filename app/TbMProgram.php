<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbMProgram extends Model
{
    //
    protected $table = 'tb_m_programs';
    protected $fillable =  ['id','kd_program','nama_program','kd_sub_kejuruan','kd_kejuruan','jumlah_paket','lama_pelatihan','asrama'];
    public $timestamps = true;
        

     public function kejuruan() {
    	return $this->belongsTo('App\TbMKejuruan', 'kd_kejuruan');
    }

    public function subkejuruan() {
    	return $this->belongsTo('App\TbMSubKejuruan', 'kd_sub_kejuruan');
    }
}
