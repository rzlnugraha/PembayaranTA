<?php

namespace App\Http\Controllers;

use App\Kepsek;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function index()
    {
        $kepsek = User::join('kepsek','kepsek.id_user','users.id')->get();
        return view('kepsek.index',compact('kepsek'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->nama_kepsek;
        $user->email = $request->email;
        $user->password = bcrypt('kepsek19');
        $user->remember_token = str_random(20);
        $user->role = $request->role;
        $user->save();
        
        $foto = $request->file('foto_kepsek');
        $nama = rand() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $nama);
        $data = [
            'id_user' => $user->id,
            'nama_kepsek' => $user->name,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'lama_jabatan' => $request->lama_jabatan,
            'alamat' => $request->alamat,
            'foto_kepsek' => $nama
        ];
        $model = Kepsek::create($data);
        return back()->with('success','Berhasil');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Kepsek::where('id_user',$id)->select('*')->join('users','users.id','kepsek.id_user')->first();
        return view('kepsek.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $foto = $request->file('foto_kepsek');
        $nama = rand() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images'), $nama);
        $data = [
            'nama_kepsek' => $request->nama_kepsek,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'lama_jabatan' => $request->lama_jabatan,
            'alamat' => $request->alamat,
            'foto_kepsek' => $nama
        ];
        // dd($data);
        
        $model = Kepsek::where('id_user',$id);
        $model->update($data);

        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $request->nama_kepsek   , 'email' => $request->email , 'role' => $request->role]);

        return back()->with('success','Berhasil');
    }

    public function destroy($id)
    {
        $kepsek = Kepsek::where('id_user', $id)->delete();
        $user = User::destroy($id);
        if($user){
            return back()->with('success','Berhasil hapus data');
        } else {
            return 'Gagal';
        }
    }
}
