<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;
use App\Siswa;
use App\Angkatan;
use App\Kelas;
use App\SPP;
use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    
    public function create()
    {
        //mana ? si ajig wkwkwk urang keur popotoan di luar hampura wkkwkw 
        // ieu yeuh
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foto_siswa' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $user = new User();
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt('sman19bdg');
        $user->remember_token = str_random(20);
        $user->role = 'siswa';
        $user->save();

        $foto = $request->file('foto_siswa');
        $nama = rand() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $nama);
        $data = [
            'id_angkatan' => $request->id_angkatan,
            'id_kelas' => $request->id_kelas,
            'id_user' => $user->id,
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto_siswa' => $nama
        ];
        $model = Siswa::create($data);
        return back()->with('success','Berhasil');
    }

    public function show($id)
    {
        $spp = SPP::all();
        $detail = SPP::select('bulans.bulan','spp.id','spp.biaya','spp.bukti_tf','spp.id_siswa','spp.tgl_bayar')->join('siswa','siswa.id_user','spp.id_siswa')
                                  ->join('bulans','bulans.id','spp.id_bulan')->where('spp.id_siswa',$id)->whereNotIn('spp.status_spp',['lunas'])
                                  ->orderBy('spp.id','DESC')
                                  ->get();
        $siswa = Siswa::where('id_user',$id)->first();
        $angkatan = Angkatan::select('*')->whereNotIn('id', [$siswa->id_angkatan])->get();
        $kelas = Kelas::select('*')->whereNotIn('id', [$siswa->id_kelas])->get();
        return view('siswa.show', compact('spp','siswa','angkatan','kelas','detail'));
    }

    public function edit($id)
    {
        // 
    }

    public function update(Request $request, $id)
    {
        $foto = $request->file('foto_siswa');
        $nama = rand() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $nama);
        $data = [
            'id_angkatan' => $request->id_angkatan,
            'id_kelas' => $request->id_kelas,
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto_siswa' => $nama
        ];
        // dd($data);
        
        $model = Siswa::findOrFail($id);
        $model->update($data);

        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $request->nama_siswa, 'email' => $request->email]);

        return back()->with('success','Berhasil');
    }

    public function destroy($id)
    {
        $siswa = Siswa::where('id_user', $id)->delete();
        $user = User::destroy($id);
        if($user){
            return back()->with('success','Berhasil hapus data');
        } else {
            return 'Gagal';
        }
    }

    public function dataSiswa()
    {
        $angkatan = Angkatan::all();
        $kelas = kelas::all();
        $data = Siswa::join('Users','Users.id', '=', 'siswa.id_user')
                ->select('*')
                ->where('users.role','siswa')
                ->get();
        return view('siswa.siswa', compact('data','angkatan','kelas'));
    }

    public function dataAngkatan()
    {
        $angkatan = Angkatan::all();
        $kelas = Kelas::all();
        $data = Siswa::join('Users','Users.id', '=', 'siswa.id_user')
                ->select('*')
                ->where('users.role','siswa')
                ->get();
                // dd($data);
        return view('siswa.dataangkatan', compact('kelas','angkatan','data'));
    }

    public function kelas_id(Request $request)
    {
        $angkatan = Angkatan::all();
        $id = $request->id_angkatan;
        $kelas = Kelas::where('id_angkatan',$id)->get();
        return view('siswa.datakelas', compact('kelas','angkatan'));
    }

    public function dataKelas($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::join('kelas','kelas.id','siswa.id_kelas')
                        ->select('*')
                        ->where('siswa.id_kelas',$id)
                        ->get();
        return view('siswa.siswa_perkelas',compact('siswa','kelas'));
    }

    public function get_data(Request $request)
    {

        if ($request->ajax())
        {
            $data = Kelas::where('id_angkatan',$request->id_angkatan)->with('Siswa')->get();
            $view = (string) view('siswa.datasiswa')->with('data',$data)->render();
            return response()->json([
                'view' => $view,
                'status' => 'success'
            ]);
        }
    }

    public function bayarspp(Request $request)
    {
        SPP::create($request->all());        
        // dd($request->all());
        return back()->with('success','Berhasil');
    }
}