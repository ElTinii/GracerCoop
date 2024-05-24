<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $primaryKey = 'log_id';
    protected $fillable = ['data', 'hora', 'client_id', 'accio','ipClient'];
}
