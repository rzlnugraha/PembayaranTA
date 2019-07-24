<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SPP;
use App\Siswa;
use App\Angkatan;
use App\Kelas;
use App\Bulan;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $spp = SPP::where('spp.id_siswa',Auth::user()->id)->whereNotIn('spp.status_spp',['belum lunas'])->get();
        // dd($spp);
        $bulan = array();
        foreach ($spp as $key ) {
            $bulan[] = $key->id_bulan; 
        }
        // dd($bulan);
        $bulan2 = Bulan::whereNotIn('id',$bulan)->get();
        $siswa = Siswa::select('angkatan.th_angkatan')->join('angkatan','angkatan.id','siswa.id_angkatan')->where('id_user',Auth::user()->id)->first();
        $angkatan = Angkatan::select('*')->whereNotIn('id', [$siswa->id_angkatan])->get();
        $kelas = Kelas::select('*')->whereNotIn('id', [$siswa->id_kelas])->get();
        return view('siswa.pembayaran', compact('spp','siswa','angkatan','kelas','bulan2'));
    }

    public function form_pembayaran($id)
    {
        $bulan = Bulan::where('id', $id)->first();
        $siswa = Siswa::select('*')->join('angkatan','angkatan.id','siswa.id_angkatan')->where('siswa.id_user',Auth::user()->id)->first();
        return view('siswa.formpembayaran', compact('bulan','siswa'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'biaya'  => 'required|numeric',
            'bukti_tf'   => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $foto = $request->file('bukti_tf');
        $nama = rand() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $nama);
        $data = [
            'id_siswa' => Auth::user()->id,
            'id_bulan' => $request->id_bulan,
            'biaya' => $request->biaya,
            'status_spp' => 'proses',
            'tgl_bayar'  => date('Y-m-d'),
            'bukti_tf' => $nama
        ];
        SPP::create($data);
        return redirect(route('Siswa.index'))->with('success','Berhasil membayar');
        
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
        SPP::findOrFail($id)->update(['status_spp' => 'lunas']);
        return back()->with('success','Berhasil');

    }

    public function destroy($id)
    {
        //
    }
}
