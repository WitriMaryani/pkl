<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_peserta extends Model
{
    //
    protected $table = 'tb_m_pesertas';
    protected $fillable =['id','no_daftar','tgl_daftar','kd_program','nama','tempat_lahir','tgl_lahir',
    					'jenis_kelamin','tinggi_badan','berat_badan','alamat','rt','rw','provinsi',
    					'kab/kota','kecamatan','kelurahan','telp/hp','agama','pendidikan_terakhir',
    					'pelatihan','kewarganegaraan','anak_ke','status','nama_pasangan','nama_anak',
    					'pengalaman_kerja','nama_ortuwali','alamat_ortuwali','telp_ortuwali','foto'];

    protected $visible = ['id','no_daftar','tgl_daftar','nama','kd_program','tempat_lahir','tgl_lahir',
    					'jenis_kelamin','tinggi_badan','berat_badan','alamat','rt','rw','provinsi',
    					'kab/kota','kecamatan','kelurahan','telp/hp','agama','pendidikan_terakhir',
    					'pelatihan','kewarganegaraan','anak_ke','status','nama_pasangan','nama_anak',
    					'pengalaman_kerja','nama_ortuwali','alamat_ortuwali','telp_ortuwali','foto'];
    public $timestamps = true;
    
    public function program()
	{
		return $this->belongsTo('App\tb_m_program','no_daftar');
	}
}
