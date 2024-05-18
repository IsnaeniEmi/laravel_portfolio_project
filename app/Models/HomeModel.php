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
        $home->save();
    }

    public function UpdateData($id, $data)
    {
        HomeModel::where('id', $id)->update([
            'judul_besar' => $data['judul_besar'],
            'deskripsi_judul' => $data['deskripsi_judul'],
            'deskripsi_about' => $data['deskripsi_about']
        ]);
    }

    public function deleteData($id)
    {
        HomeModel::where('id', $id)->delete();
    }
}
