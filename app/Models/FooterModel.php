<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'footer';
    protected $guard = 'footer';

    public function getById($id)
    {
        return FooterModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return FooterModel::paginate(10);
    }

    public function saveData($data)
    {
        $footer = new FooterModel();
        $footer->link_footer = $data['link_footer'];
        $footer->save();
    }

    public function UpdateData($id, $data)
    {
        FooterModel::where('id', $id)->update([
            'link_footer' => $data['link_footer'],
        ]);
    }

    public function deleteData($id)
    {
        FooterModel::where('id', $id)->delete();
    }
}
