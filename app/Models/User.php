<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function getById($id)
    {
        return User::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return User::paginate(10);
    }

    public function saveData($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->telepon = $data['telepon'];
        $user->agama = $data['agama'];
        $user->status = $data['status'];
        $user->alamat = $data['alamat'];
        $user->tempat_lahir = $data['tempat_lahir'];
        $user->tanggal_lahir = $data['tanggal_lahir'];
        $user->save();
    }

    public function UpdateData($id, $data)
    {
        User::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => $data['password'],
            'telepon' => $data['telepon'],
            'agama' => $data['agama'],
            'status' => $data['status'],
            'alamat' => $data['alamat'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir']
        ]);
    }

    public function deleteData($id)
    {
        User::where('id', $id)->delete();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
