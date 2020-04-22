<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','empresa', 'fantasia', 'celular', 'fixo','cnpj'];

    protected $dates = ['deleted_at'];
}
