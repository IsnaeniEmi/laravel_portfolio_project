<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pendidikan';
    protected $guard = 'pendidikan';

    public function getById($id)
    {
        return PendidikanModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return PendidikanModel::paginate(10);
    }

    public function saveData($data)
    {
        $pendidikan = new PendidikanModel();
        $pendidikan->nama_institusi = $data['nama_institusi'];
        $pendidikan->jenjang = $data['jenjang'];
        $pendidikan->angkatan = $data['angkatan'];
        $pendidikan->jurusan = $data['jurusan'];
        if (isset($data['file']) && $data['file']->isValid()) {
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $pendidikan->foto = $filePath;
        }
        $pendidikan->save();

    }

    public function updateData($id, $data)
    {
        $pendidikan = PendidikanModel::find($id);
        $pendidikan->nama_institusi = $data['nama_institusi'];
        $pendidikan->jenjang = $data['jenjang'];
        $pendidikan->angkatan = $data['angkatan'];
        $pendidikan->jurusan = $data['jurusan'];

        if (isset($data['file']) && $data['file']->isValid()) {
            // Hapus file lama jika ada
            if ($pendidikan->file && Storage::disk('public')->exists($pendidikan->file)) {
                Storage::disk('public')->delete($pendidikan->file);
            }
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $pendidikan->file = $filePath;
        }

        $pendidikan->save();
    }

    public function deleteData($id)
    {
        PendidikanModel::where('id', $id)->delete();
    }
}
