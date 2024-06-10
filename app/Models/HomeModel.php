<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'home';
    protected $guard = 'home';

    public function getById($id)
    {
        return HomeModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return HomeModel::paginate(10);
    }

    public function saveData($data)
    {
        $home = new HomeModel();
        $home->judul_besar = $data['judul_besar'];
        $home->deskripsi_judul = $data['deskripsi_judul'];
        $home->deskripsi_about = $data['deskripsi_about'];

        if (isset($data['file']) && $data['file']->isValid()) {
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $home->file = $filePath;
        }

        $home->save();
    }

    public function UpdateData($id, $data)
    {
        $home = HomeModel::find($id);
        $home->judul_besar = $data['judul_besar'];
        $home->deskripsi_judul = $data['deskripsi_judul'];
        $home->deskripsi_about = $data['deskripsi_about'];

        if (isset($data['file']) && $data['file']->isValid()) {
            // Hapus file lama jika ada
            if ($home->file && Storage::disk('public')->exists($home->file)) {
                Storage::disk('public')->delete($home->file);
            }
            $fileName = time() . '_' . $data['file']->getClientOriginalName();
            $filePath = $data['file']->storeAs('uploads', $fileName, 'public');
            $home->file = $filePath;
        }

        $home->save();
    }

    public function deleteData($id)
    {
        HomeModel::where('id', $id)->delete();
    }
}
