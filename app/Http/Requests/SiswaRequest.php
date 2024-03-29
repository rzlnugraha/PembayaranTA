<?php

namespace App\Http\Requests;
use App\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = new Siswa();
        
        return [
            'id_angkatan' => 'required',
            'id_kelas' => 'required',
            'id_user' => 'required',
            'nama_siswa' => 'required',
            'nis' => 'required|string|unique:siswa,nis' . $id->id,
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ];
    }
}
