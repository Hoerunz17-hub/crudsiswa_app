<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    //nama tabel
    protected $table = 'clases';

    //fillable
    protected $guarded = [];

    //relasi ke tabel users
    public function users(){
        return $this->hasMany(User::class, 'clas_id');
    }

}
