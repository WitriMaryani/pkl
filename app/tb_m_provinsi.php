<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_provinsi extends Model
{
    // 
    protected $table = 'tb_m_provinsis';
    protected $fillable =['lokasi_id','lokasi_kode','lokasi_nama','lokasi_provinsi','lokasi_kabupatenkota',
    					'lokasi_kecamatan','lokasi_kelurahan'];

    protected $visible = ['lokasi_id','lokasi_kode','lokasi_nama','nama','','lokasi_kabupatenkota',
    					'lokasi_kecamatan','lokasi_kelurahan'];
    public $timestamps = true;
}
