<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'response';
    protected $guard = 'response';

    public function getById($id)
    {
        return ContactUsModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return ContactUsModel::paginate(10);
    }

    public function saveData($data)
    {
        $contact = new ContactUsModel();
        $contact->nama_lengkap = $data['nama_lengkap'];
        $contact->email = $data['email'];
        $contact->telepon = $data['telepon'];
        $contact->pesan = $data['pesan'];
        $contact->save();
    }

    public function UpdateData($id, $data)
    {
        ContactUsModel::where('id', $id)->update([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'pesan' => $data['pesan']
        ]);
    }

    public function deleteData($id)
    {
        ContactUsModel::where('id', $id)->delete();
    }
}
