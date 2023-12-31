<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'abreviacao', 'idioma_id'];

    protected $table = 'versoes';
}
