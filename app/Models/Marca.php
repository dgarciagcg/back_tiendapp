<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;

    protected $fillable = [
        'id_marca',
        'nombre',
        'referencia',
    ];
}
