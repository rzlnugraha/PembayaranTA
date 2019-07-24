<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SPP;
use App\Angkatan;
use App\Kelas;
use App\Siswa;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin.index');
    }

    public function data_bayar()
    {
        return view('admin.index');
    }

    public function get_json(Request $request)
    {

        if ($request->ajax())
        {
            $tanggal = Carbon::parse($request->tgl)->startOfDay();

            $data = SPP::select('*')
            ->join('siswa','siswa.id_user','spp.id_siswa')
            ->join('kelas','kelas.id','siswa.id_kelas')
            ->join('angkatan','angkatan.id','siswa.id_angkatan')
            ->where('spp.status_spp','proses')
            ->where('spp.tgl_bayar',$tanggal)
            ->get();
            $view = (string) view('admin.datapembayaran')->with('data',$data)->render();
            return response()->json([
                'view' => $view,
                'status' => 'success'
            ]);
        }
    }

    public function historyPembayaran()
    {
        $spp = SPP::select('*')
                    ->join('bulans','bulans.id','spp.id_bulan')
                    ->join('siswa','siswa.id_user','spp.id_siswa')
                    ->join('angkatan','angkatan.id','siswa.id_angkatan')
                    ->join('kelas','kelas.id','siswa.id_kelas')
                    ->where('status_spp','lunas')->orderBy('spp.tgl_bayar','DESC')->get();
        return view('admin.historypembayaran',compact('spp'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
