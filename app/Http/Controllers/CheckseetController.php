<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Checkseet;
use Carbon\Carbon;
class CheckseetController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-index-checkseet')) {
            if ($request->ajax()) {
                if (Auth::user()->hasRole('user')) {
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
                } else if(Auth::user()->hasRole(['ict-adyawinsa','departemen-head'])){
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
                }
                
                return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    if (Auth::user()->hasRole('ict-adyawinsa')) {
                        return view('datatables._action-checkseet', [
                            'model' => $data,
                            'edit_url'=> route('checkseet.editHeader', $data->id),
                            'deleted'=> route('checkseet.deleted', $data->id)
                        ]);
                    } else if(Auth::user()->hasRole('user')){
                        return view('datatables._action-checkseet-users', [
                            'model' => $data,
                            'approve_users_url'=> route('checkseet.approve_users', $data->id)
                        ]); 
                    } elseif (Auth::user()->hasRole('departemen-head')) {
                        return view('datatables._action-checkseet-head', [
                            'model' => $data,
                            'approve_head_url'=> route('checkseet.approve-head', $data->id)
                        ]); 
                    }
                })
                ->addColumn('status', function($data){
                        return view('datatables._action-status', [
                           'model' => $data
                        ]);
                 })
                ->rawColumns(['action', 'status'])
                ->make(true);
            }
            return view('user-dashboard.ict-adw.checkseet.index');
        } else {
            return view('error.403');
        }
    }

    public function create()
    {
        if (Auth::user()->hasPermission('manage-index-checkseet')) {
            return view('user-dashboard.ict-adw.checkseet.create');
        } else {
            return view('error.403');
        }
    }
    public function masterItem()
    {
        if (Auth::user()->hasPermission(['create-checkseet','master-item'])) {
            $masterItem = DB::connection('db_checkseet')->table('master_items')
                         ->orderBy('id','asc')
                         ->get();
            $response = array();
            foreach ($masterItem  as $query)
            {
            $response[] = [
                'id' => $query->id,
                'items' => $query->items,
                'standard' => $query->standard,
                'kategori' => $query->kategori,
            ];
            }
            echo json_encode($response);
            exit;
        } else {
            return view('error.403');
        }
    }
    public function storeCheckseet(Request $request)
    {
        if (Auth::user()->hasPermission(['create-checkseet','master-item'])) {
            $getData = json_decode($request->getContent(), true);
            // dd($getData);
            $len = count($getData);
			for ($i = 0;$i < $len ; $i++){
				$new_data                        = new Checkseet;
				$new_data->nama_pemakai          = $getData[0]['nama_pemakai'];
				$new_data->tahun                 = $getData[0]['tahun'];
				$new_data->kode_asset            = $getData[0]['kode_asset'];
				$new_data->jenis                 = $getData[0]['jenis'];
				$new_data->lama_pemeriksaan      = $getData[0]['lama_pemeriksaan'];
				$new_data->semester              = $getData[0]['semester'];
				$new_data->items_id              = $getData[$i]['items_id'];
				$new_data->mark                  = $getData[$i]['mark'];
				$new_data->catatan               = $getData[$i]['catatan'];
				$new_data->created_by            = Auth::user()->name;
				$new_data->created_date          = Carbon::now();
				$new_data->save();
			}
            return response()->json([
                'status' => true
            ], 200);
        } else {
            return view('error.403');
        }
    }
    public function viewHeader($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','view-checkseet'])) {
            $model = new Checkseet;
            $viewHeader = $model->getViewHeader($id);
            $kode_asset = $viewHeader->kode_asset;
            $semester = $viewHeader->semester;
            $viewDetail = $model->getViewDetail($kode_asset, $semester);
            $output = [
                'header' => $viewHeader,
                'detail' => $viewDetail
            ];
            return response()->json($output);
        } else {
            return view('error.403');
        }
       
    }
    public function viewDetail($kode_asset, $semester)
    {
        if (Auth::user()->hasPermission('manage-index-checkseet')) {
            $model = new Checkseet;
            $viewDetail = $model->getViewDetail($kode_asset, $semester);
            return Datatables::of($viewDetail)
               ->editColumn('mark', function($data){
                  return $mark = ($data->mark != 'baik' ? ' ' : view('datatables.img_._action-img'));                
               })
               ->make(true);
        } else {
            return view('error.403');
        }
    }
    public function editHeader($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet'])) {
            $model = new Checkseet;
            $viewHeader = $model->getViewHeader($id);
            $kode_asset = $viewHeader->kode_asset;
            $semester = $viewHeader->semester;
            $viewDetail = $model->getViewDetail($kode_asset, $semester);
            $output = [
                'header' => $viewHeader,
                'detail' => $viewDetail
            ];
            return response()->json($output);
        } else {
            return view('error.403');
        }
        
    }
    public function editDetail($kode_asset, $semester)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet'])) {
            $model = new Checkseet;
            $viewDetail = $model->getViewDetail($kode_asset, $semester);
            return Datatables::of($viewDetail)
               ->editColumn('mark', function($data){
                   return $mark = ($data->mark != 'baik' ? ' ' : view('datatables.img_._action-img'));
               })
               ->addColumn('action', function($data){
                    return view('datatables._action-edit-checkseet', [
                        'model' => $data,
                        'edit_url'=> route('checkseet.editDetailItems', $data->id),
                    ]);
               })
               ->make(true);
        } else {
            return view('error.403');
        }
    }
    public function editDetailItems($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet'])) {
            $model = new Checkseet;
            $data = $model->editDetailItemHelper($id);
            return response()->json($data);
        } else {
            return view('error.403');
        }
    }
    public function updateDetail(Request $request, $id)
    {
        // dd($request->all());
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet'])) {
           $data = Checkseet::find($id);
           $data->mark = $request->mark;
           $data->catatan = $request->catatan;
           $data->save();

           return response()->json([
             'status'=> true
           ], 200);
        } else {
            return view('error.403');
        }
    }
    public function update(Request $request, $id)
    {   
        // dd($request->all());
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet'])) {
            $data = Checkseet::find($id);
            $kode_asset = $data->kode_asset;
            $semester = $data->semester;

             DB::connection('db_checkseet')->table('checkseet_in')
                ->where('kode_asset', $kode_asset)
                ->where('semester', $semester)
                ->update([
                    'nama_pemakai' => $request->nama_pemakai,
                    'tahun' => $request->tahun,
                    'kode_asset' => $request->kode_asset,
                    'jenis' => $request->jenis,
                    'lama_pemeriksaan' => $request->lama_pemeriksaan,
                    'semester' => $request->semester
                ]);
            return response()->json([
              'status'=> true
            ], 200);
         } else {
             return view('error.403');
         }
    }
    public function approveIct($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','edit-checkseet','approve-ict'])) {
            $data = Checkseet::find($id);
            $kode_asset = $data->kode_asset;
            $semester = $data->semester;
            $tahun = $data->tahun;
            $approve_ict = $data->approve_date_1;
            if ($approve_ict !== null) {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                    'approve_by_1' => NULL,
                    'approve_date_1' => NULL
                    ]);
            } else {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                        'approve_by_1' => Auth::user()->name,
                        'approve_date_1' => Carbon::now()
                    ]);
            }
            
            return response()->json([
              'status'=> true
            ], 200);
         } else {
             return view('error.403');
         }
    }

    public function deleted($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','delete-checkseet'])) {
            $data = Checkseet::find($id);
            $kode_asset = $data->kode_asset;
            $semester = $data->semester;
            $tahun = $data->tahun;
            DB::connection('db_checkseet')->table('checkseet_in')
                ->where('kode_asset', $kode_asset)
                ->where('semester', $semester)
                ->where('tahun', $tahun)
                ->delete();
              return response()->json([
                'status'=> true
               ], 200);
        } else {
            return view('error.403');
        }
    }
    public function approveUsers($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','view-checkseet'])) {
            $data = Checkseet::find($id);
            $kode_asset = $data->kode_asset;
            $semester = $data->semester;
            $tahun = $data->tahun;
            $approve_users = $data->approve_date_2;
            if ($approve_users !== null) {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                    'approve_by_2' => NULL,
                    'approve_date_2' => NULL
                    ]);
            } else {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                        'approve_by_2' => Auth::user()->name,
                        'approve_date_2' => Carbon::now()
                    ]);
            }

            return response()->json([
            'status'=> true
            ], 200);
        } else {
            return view('error.403');
        }
    }
    public function approveHead($id)
    {
        if (Auth::user()->hasPermission(['manage-index-checkseet','view-checkseet'])) {
            $data = Checkseet::find($id);
            $kode_asset = $data->kode_asset;
            $semester = $data->semester;
            $tahun = $data->tahun;
            $approve_head = $data->approve_date_3;
            if ($approve_head !== null) {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                    'approve_by_3' => NULL,
                    'approve_date_3' => NULL
                    ]);
            } else {
                DB::connection('db_checkseet')->table('checkseet_in')
                    ->where('kode_asset', $kode_asset)
                    ->where('semester', $semester)
                    ->where('tahun', $tahun)
                    ->update([
                        'approve_by_3' => Auth::user()->name,
                        'approve_date_3' => Carbon::now()
                    ]);
            }

            return response()->json([
            'status'=> true
            ], 200);
        } else {
            return view('error.403');
        }
    }
}
