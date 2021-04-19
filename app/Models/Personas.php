<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = ['nombre', 'genero', 'altura', 'peso', 'nacimiento', 'planeta','color', 'elemento', 'visitas', 'nombreplaneta'];
}
