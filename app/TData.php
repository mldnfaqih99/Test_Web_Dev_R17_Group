<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TData extends Model
{
    protected $table = 't_data';

    public static function getDataForDatatable(){

        $Data = DB::table('t_data')
        ->select(
            't_data.id as ID',
            't_data.nama as Nama',
            't_data.jabatan as Jabatan',
            't_data.jenis_kelamin as JenisKelamin',
            't_data.alamat as Alamat',
        )->get();

        return $Data;
    }
}
