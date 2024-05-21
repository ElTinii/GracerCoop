<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpetas extends Model
{
    use HasFactory;

    protected $fillable = ['nom','ruta','empresa_id'];
}
