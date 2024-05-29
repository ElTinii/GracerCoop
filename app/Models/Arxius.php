<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arxius extends Model
{   
    protected $table = 'arxius';
    protected $primaryKey = 'arxiu_id';
    use HasFactory;
    protected $fillable = ['nom','ruta','carpeta_padre','empresa_id'];
}
