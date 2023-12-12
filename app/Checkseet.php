<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Checkseet extends Model
{
    // protected $connection = 'db_checkseet';

    protected $table = 'checkseet_in';
    protected $fillable = [ 
      'items_id','lama_pemeriksaan','nama_pemakai','jenis','tahun','kode_asset','semester','mark','catatan',
    ];
    public $timestamps = false;

    public function getViewHeader($id)
    {
        $data_header = DB::connection('db_checkseet')->table('checkseet_in')
        ->leftJoin('master_items','checkseet_in.items_id','=','master_items.id')
        ->select(
            'checkseet_in.id',
            // DB::raw('master_items.id as id_items'),
            'nama_pemakai',
            'semester',
            'jenis',
            'tahun',
            'kode_asset',
            'lama_pemeriksaan'
        )
        ->where('checkseet_in.id', $id)
        ->first();
        return $data_header;
    }
    public function getViewDetail($kode_asset,$semester)
    {
        $data_detail = DB::connection('db_checkseet')->table('checkseet_in')
        ->leftJoin('master_items','checkseet_in.items_id','=','master_items.id')
        ->select(
            'checkseet_in.id',
            'checkseet_in.items_id',
            'master_items.items',
            'master_items.standard',
            'checkseet_in.mark',
            'checkseet_in.catatan',
            'checkseet_in.kode_asset',
            'checkseet_in.semester'
        )
        ->where('checkseet_in.kode_asset', $kode_asset)
        ->where('checkseet_in.semester', $semester)
        ->orderBy('checkseet_in.items_id','DESC')
        ->get();
        return $data_detail;
    }
    public function editDetailItemHelper($id)
    {
        $data_detail = DB::connection('db_checkseet')->table('checkseet_in')
        ->leftJoin('master_items','checkseet_in.items_id','=','master_items.id')
        ->select(
            'checkseet_in.id',
            'checkseet_in.items_id',
            'master_items.items',
            'master_items.standard',
            'checkseet_in.mark',
            'checkseet_in.catatan'
        )
        ->where('checkseet_in.id', $id)
        ->first();
        return $data_detail;
    }
    public function queryCheck()
    {
        $data = DB::connection('db_checkseet')->table('checkseet_in')
        ->leftJoin('master_items','checkseet_in.items_id','=','master_items.id')
        ->select(
            'checkseet_in.id',
            'semester',
            'jenis',
            'tahun',
            'kode_asset',
            'approve_date_1',
            'approve_by_1',
            'approve_date_2',
            'approve_by_2',
            'approve_date_3',
            'approve_by_3'

        )
        // ->where('kode_asset','=', Auth::user()->kode_asset)
        ->groupBy('kode_asset')
        ->get();
        return $data;
    }
    public function queryCheckUsers()
    {
            $data = DB::connection('db_checkseet')->table('checkseet_in')
            ->leftJoin('master_items','checkseet_in.items_id','=','master_items.id')
            ->select(
                'checkseet_in.id',
                'semester',
                'jenis',
                'tahun',
                'kode_asset',
                'approve_date_1',
                'approve_by_1',
                'approve_date_2',
                'approve_by_2',
                'approve_date_3',
                'approve_by_3'

            )
            ->where('kode_asset','=', Auth::user()->kode_asset)
            ->groupBy('kode_asset')
            ->get();
        return $data;
    }
}
