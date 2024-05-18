<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengalamanModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pengalaman';
    protected $guard = 'pengalaman';

    public function getById($id)
    {
        return PengalamanModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return PengalamanModel::paginate(10);
    }

    public function saveData($data)
    {
        $pengalaman = new PengalamanModel();
        $pengalaman->nama_pt = $data['nama_pt'];
        $pengalaman->posisi = $data['posisi'];
        $pengalaman->mulai = $data['mulai'];
        $pengalaman->lokasi = $data['lokasi'];
         if (isset($data['file']) && $data['file']->isValid()) {
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $pendidikan->foto = $filePath;
        }
        $pengalaman->save();
    }

    public function UpdateData($id, $data)
    {
        PengalamanModel::where('id', $id)->update([
            'nama_pt' => $data['nama_pt'],
            'posisi' => $data['posisi'],
            'mulai' => $data['mulai'],
            'lokasi' => $data['lokasi']
        ]);

        $pengalaman = PengalamanModel::find($id);
        $pengalaman->nama_pt = $data['nama_pt'];
        $pengalaman->posisi = $data['posisi'];
        $pengalaman->mulai = $data['mulai'];
        $pengalaman->lokasi = $data['lokasi'];

        if (isset($data['file']) && $data['file']->isValid()) {
            // Hapus file lama jika ada
            if ($pengalaman->file && Storage::disk('public')->exists($pengalaman->file)) {
                Storage::disk('public')->delete($pengalaman->file);
            }
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $pengalaman->file = $filePath;
        }

        $pengalaman->save();
    }

    public function deleteData($id)
    {
        PengalamanModel::where('id', $id)->delete();
    }
}
